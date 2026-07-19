<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\LegalCase;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalLawyers' => User::where('role', 'lawyer')->count(),
            'totalClients' => User::where('role', 'client')->count(),
            'totalCases' => LegalCase::count(),
            'pendingCases' => LegalCase::where('status', 'Pending')->count(),
            'resolvedCases' => LegalCase::where('status', 'Resolved')->count(),
        ]);
    }
}