<?php

namespace App\Http\Controllers\Client;

use App\Models\LegalCase;
use App\Models\CaseRequest;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        $clientId = auth()->id();
        $totalCases = LegalCase::where('client_id',$clientId)
            ->count();

        $activeCases = LegalCase::where('client_id',$clientId)
            ->where('status','In Progress')
            ->count();

        $resolvedCases = LegalCase::where('client_id',$clientId)
            ->where('status','Resolved')
            ->count();

        $pendingRequests = CaseRequest::where('client_id',$clientId)
            ->where('status','Pending')
            ->count();


        return view('client.dashboard', compact(
            'totalCases',
            'activeCases',
            'resolvedCases',
            'pendingRequests'
        ));
    }
}