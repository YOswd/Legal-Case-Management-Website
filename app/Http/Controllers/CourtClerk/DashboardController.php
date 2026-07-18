<?php

namespace App\Http\Controllers\CourtClerk;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;

class DashboardController extends Controller
{
    public function index()
    {
        $pendingFilings = LegalCase::where('status','Pending')
            ->count();

        $activeCases = LegalCase::where('status','In Progress')
            ->count();

        $resolvedCases = LegalCase::where('status','Resolved')
            ->count();

        $upcomingHearings = LegalCase::whereNotNull('hearing_date')
            ->whereDate('hearing_date','>=',today())
            ->count();


        return view('courtclerk.dashboard', compact(
            'pendingFilings',
            'activeCases',
            'resolvedCases',
            'upcomingHearings'
        ));
    }
}