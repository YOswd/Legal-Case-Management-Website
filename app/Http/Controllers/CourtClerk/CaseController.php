<?php

namespace App\Http\Controllers\CourtClerk;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;

class CaseController extends Controller
{
    public function index()
    {
        $cases = LegalCase::with(['client','lawyer'])
            ->where('status','Pending Verification')
            ->latest()
            ->get();

        return view('courtclerk.filings.index', compact('cases'));
    }

    public function show(LegalCase $legalCase)
    {
        return view('courtclerk.filings.show', compact('legalCase'));
    }

    public function verify(Request $request, LegalCase $legalCase)
    {
        $legalCase->update([
            'status' => 'Verified',
            'court_name' => $request->court_name,
            'court_level' => $request->court_level,
            'hearing_date' => $request->hearing_date,
            'hearing_time' => $request->hearing_time,
    ]);

    return redirect()
        ->route('courtclerk.filings')
        ->with('success','Court filing verified successfully.');
    }
}