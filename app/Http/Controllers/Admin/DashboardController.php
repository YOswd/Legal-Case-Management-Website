<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
{
    return view('admin.dashboard', [
            'totalUsers' => \App\Models\User::count(),
            'totalLawyers' => \App\Models\User::where('role', 'lawyer')->count(),
            'totalClients' => \App\Models\User::where('role', 'client')->count(),
            'totalCases' => \App\Models\LegalCase::count(),
            'pendingCases' => \App\Models\LegalCase::where('status', 'Pending')->count(),
            'resolvedCases' => \App\Models\LegalCase::where('status', 'Resolved')->count(),
        ]);
    }
}