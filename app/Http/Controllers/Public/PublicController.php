<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\LawyerProfile;
use App\Models\User;
use App\Models\LegalCase;

class PublicController extends Controller
{
    public function home()
    {
       return view('public.home', [

        'lawyerCount' => \App\Models\LawyerProfile::count(),
        'clientCount' => \App\Models\User::where('role', 'client')->count(),
        'caseCount' => \App\Models\LegalCase::count(),
        'featuredLawyers' => \App\Models\LawyerProfile::with('user')
            ->latest()
            ->take(4)
            ->get(),

    ]);
    }

    public function lawyers()
    {
        $lawyers = LawyerProfile::with('user')
            ->where('availability', true)
            ->paginate(9);

        return view('public.lawyers.index', compact('lawyers'));
    }

    public function show(LawyerProfile $lawyer)
    {
        $lawyer->load('user');

        return view('public.lawyers.show', compact('lawyer'));
    }

    public function about()
    {
        return view('public.about');
    }

    public function contact()
    {
        return view('public.contact');
    }
}