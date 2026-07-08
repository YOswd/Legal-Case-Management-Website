<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\CaseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaseRequestController extends Controller
{
    public function create(User $lawyer)
    {
        return view('client.requests.create', compact('lawyer'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'lawyer_id' => 'required|exists:users,id',

            'title' => 'required|max:255',

            'description' => 'required',

            'budget' => 'nullable|integer|min:0',

        ]);

        CaseRequest::create([

            'client_id' => Auth::id(),

            'lawyer_id' => $request->lawyer_id,

            'title' => $request->title,

            'description' => $request->description,

            'budget' => $request->budget,

            'status' => 'Pending',

        ]);

        return redirect()
            ->route('client.dashboard')
            ->with('success', 'Case request sent successfully.');
    }

    public function index()
    {
        $requests = CaseRequest::with('lawyer')
            ->where('client_id', auth()->id())
            ->latest()
            ->get();

        return view('client.requests.index', compact('requests'));
    }

    public function accept(CaseRequest $request)
    {
        $request->update([
            'status' => 'Accepted'
        ]);

        return back()->with('success', 'Case request accepted.');
    }

    public function reject(CaseRequest $request)
    {
        $request->update([
            'status' => 'Rejected'
        ]);

        return back()->with('success', 'Case request rejected.');
    }

    public function show(CaseRequest $caseRequest)
    {
        abort_if($caseRequest->client_id != auth()->id(),403);

        $caseRequest->load('lawyer');

        return view('client.requests.show', compact('caseRequest'));
    }
}