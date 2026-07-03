<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\LawyerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
{
    $profile = LawyerProfile::where('user_id', Auth::id())->first();

    if (!$profile) {
        $profile = new LawyerProfile();
    }

    return view('lawyer.profile.edit', compact('profile'));
}

    public function update(Request $request)
{
    $request->validate([
        'specialization' => 'required',
        'experience' => 'required|integer',
        'qualification' => 'required',
        'bar_council_no' => 'required',
        'consultation_fee' => 'required|integer',
        'bio' => 'nullable',
        'phone' => 'nullable',
        'address' => 'nullable',
        'city' => 'nullable',
    ]);

    LawyerProfile::updateOrCreate(
        ['user_id' => Auth::id()],
        [
            'specialization' => $request->specialization,
            'experience' => $request->experience,
            'qualification' => $request->qualification,
            'bar_council_no' => $request->bar_council_no,
            'consultation_fee' => $request->consultation_fee,
            'bio' => $request->bio,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
        ]
    );

    return redirect()
        ->back()
        ->with('success', 'Profile updated successfully.');
}
}