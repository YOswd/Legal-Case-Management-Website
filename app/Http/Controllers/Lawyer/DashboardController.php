<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use App\Models\CaseRequest;
use App\Models\LegalDocument;

class DashboardController extends Controller
{
    public function index()
    {
        $lawyerId = auth()->id();


        $totalCases = LegalCase::where('lawyer_id',$lawyerId)
            ->count();


        $activeCases = LegalCase::where('lawyer_id',$lawyerId)
            ->where('status','In Progress')
            ->count();


        $resolvedCases = LegalCase::where('lawyer_id',$lawyerId)
            ->where('status','Resolved')
            ->count();


        $pendingRequests = CaseRequest::where('lawyer_id',$lawyerId)
            ->where('status','Pending')
            ->count();


        $documents = LegalDocument::where('uploaded_by',$lawyerId)
            ->count();



        return view('lawyer.dashboard', compact(
            'totalCases',
            'activeCases',
            'resolvedCases',
            'pendingRequests',
            'documents'
        ));
    }
}