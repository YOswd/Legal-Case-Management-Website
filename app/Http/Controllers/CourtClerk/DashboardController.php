<?php

namespace App\Http\Controllers\CourtClerk;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('courtclerk.dashboard');
    }
}