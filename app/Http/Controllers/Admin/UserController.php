<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'role' => 'required|in:admin,lawyer,client',
        ]);

        $user->update($validated);

        return redirect()
            ->route('admin.users.show', $user)
            ->with('success', 'User updated successfully.');
    }

    public function pendingVerification()
{
    $users = User::whereIn('role', ['lawyer','court_clerk'])
                ->where('is_verified', false)
                ->latest()
                ->get();

    return view(
        'admin.users.verification',
        compact('users')
    );
}

public function verify(User $user)
{
    $user->update([
        'is_verified' => true
    ]);

    return back()
        ->with('success','User verified successfully.');
}

public function reject(User $user)
{
    $user->delete();

    return back()
        ->with('success','Registration rejected.');
}

public function create()
{
    return view('admin.users.create');
}

public function store(Request $request)
{
    $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:8',
        'role'=>'required|in:lawyer,court_clerk',
    ]);

    User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
        'role'=>$request->role,
        'is_verified'=>true,
    ]);

    return redirect()
        ->route('admin.users.index')
        ->with('success','User created successfully.');
}
}