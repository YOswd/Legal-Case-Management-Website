<?php

namespace App\Http\Controllers;

use App\Models\LawyerProfile;

class LawyerDirectoryController extends Controller
{
    public function index()
    {
        $lawyers = LawyerProfile::with('user')
            ->where('availability', true)
            ->latest()
            ->get();

        return view('public.lawyers.index', compact('lawyers'));
    }

    public function show(LawyerProfile $lawyer)
    {
        $lawyer->load('user');

        return view('public.lawyers.show', compact('lawyer'));
    }
}