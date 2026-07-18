<?php

namespace App\Http\Controllers\Lawyer;

use App\Models\LegalCase;
use App\Models\CaseRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
        $requests = CaseRequest::with('client')
            ->where('lawyer_id', Auth::id())
            ->latest()
            ->get();

        return view('lawyer.requests.index', compact('requests'));
    }

    public function accept(CaseRequest $caseRequest)
    {
        // Security: only the assigned lawyer can accept
        if ($caseRequest->lawyer_id != auth()->id()) {
            abort(403);
        }

        // Prevent duplicate processing
        if ($caseRequest->status != 'Pending') {
            return back()->with('error', 'This request has already been processed.');
        }

        // Update request status
        $caseRequest->update([
            'status' => 'Accepted'
        ]);

        if (LegalCase::where('case_request_id', $caseRequest->id)->exists()) {
            return back()->with('error', 'A legal case has already been created for this request.');
        }

        // Create the legal case
        $legalCase = LegalCase::firstOrCreate(
        [
            'case_request_id' => $caseRequest->id,
        ],
        [
            'client_id'       => $caseRequest->client_id,
            'lawyer_id'       => $caseRequest->lawyer_id,
            'case_number'     => 'CASE-' . now()->format('Y') . '-' 
            . str_pad($caseRequest->id, 5, '0', STR_PAD_LEFT),
            'title'           => $caseRequest->title,
            'description'     => $caseRequest->description,
            'case_type'       => 'Civil',
            'priority'        => 'Medium',
            'status'          => 'Pending',
            'filing_date'     => now()->toDateString(),
            'court_name'      => 'Not Assigned',
        ]
        );

        \App\Models\LegalDocument::where('case_request_id', $caseRequest->id)
        ->update([
            'legal_case_id' => $legalCase->id,
            'case_request_id' => null,
        ]);

        return redirect()
            ->route('lawyer.requests')
            ->with('success', 'Request accepted and legal case created successfully.');
    }

    public function reject(CaseRequest $caseRequest)
    {
        abort_if($caseRequest->lawyer_id !== auth()->id(), 403);

        $caseRequest->update([
            'status' => 'Rejected'
        ]);

        return back()->with('success', 'Case request rejected.');
    }

    public function show(CaseRequest $caseRequest)
    {
        abort_if($caseRequest->lawyer_id != auth()->id(),403);

        $caseRequest->load([
            'client',
            'documents',
        ]);

        return view('lawyer.requests.show', compact('caseRequest'));
    }
}