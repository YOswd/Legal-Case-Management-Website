<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\CaseRequest;
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
        abort_if($caseRequest->lawyer_id !== auth()->id(), 403);

        $caseRequest->update([
            'status' => 'Accepted'
        ]);

        return back()->with('success', 'Case request accepted.');
    }

    public function reject(CaseRequest $caseRequest)
    {
        abort_if($caseRequest->lawyer_id !== auth()->id(), 403);

        $caseRequest->update([
            'status' => 'Rejected'
        ]);

        return back()->with('success', 'Case request rejected.');
    }
}