<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\LegalCase;
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

    public function edit(CaseRequest $caseRequest)
    {
        abort_if($caseRequest->client_id != auth()->id(), 403);

        if ($caseRequest->status != 'Pending') {
            return back()->with('error', 'You can only edit pending requests.');
        }

        return view('client.requests.edit', compact('caseRequest'));
    }

    public function update(Request $request, CaseRequest $caseRequest)
    {
        abort_if($caseRequest->client_id != auth()->id(), 403);

        if ($caseRequest->status != 'Pending') {
            return back()->with('error', 'You can only edit pending requests.');
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'budget' => 'nullable|integer|min:0',
        ]);

        $caseRequest->update([
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
        ]);

        return redirect()
            ->route('client.requests.show', $caseRequest)
            ->with('success', 'Request updated successfully.');
    }

    public function destroy(CaseRequest $caseRequest)
    {
        abort_if($caseRequest->client_id != auth()->id(), 403);

        if ($caseRequest->status != 'Pending') {
            return back()->with('error', 'You can only cancel pending requests.');
        }

        $caseRequest->delete();

        return redirect()
            ->route('client.requests')
            ->with('success', 'Request cancelled successfully.');
    }

    public function myCases()
    {
        $cases = LegalCase::with('lawyer')
            ->where('client_id', auth()->id())
            ->latest()
            ->get();

        return view('client.cases.index', compact('cases'));
    }

    public function caseDetails(LegalCase $legalCase)
    {
        if ($legalCase->client_id != auth()->id()) {
            abort(403);
        }

        $legalCase->load('lawyer');

        return view('client.cases.show', compact('legalCase'));
    }

    public function appealForm(LegalCase $legalCase)
    {
        return view('client.cases.appeal', compact('legalCase'));
    }

    public function submitAppeal(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'appeal_court'=>'required'
        ]);

        $legalCase->update([
            'appealed'=>true,
            'appeal_date'=>today(),
            'appeal_court'=>$request->appeal_court,
            // reopen case
            'status'=>'Pending'

        ]);

        return redirect()
            ->route('client.cases')
            ->with('success','Appeal submitted successfully.');
    }
}