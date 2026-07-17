<?php

namespace App\Http\Controllers\CourtClerk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LegalCase;

class CaseController extends Controller
{
    // Pending Filings
    public function index()
    {
        $cases = LegalCase::with(['client','lawyer'])
                    ->where('status', 'Pending')
                    ->latest()
                    ->get();

        return view('courtclerk.filings.index', compact('cases'));
    }

    // Show Verify Filing Page
    public function show(LegalCase $legalCase)
    {
        return view('courtclerk.filings.show', compact('legalCase'));
    }

    // Verify Filing
    public function verify(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'court_name' => 'required',
            'court_level' => 'required',
            'hearing_date' => 'required|date',
            'hearing_time' => 'required'
        ]);

        $legalCase->update([
            'court_name'   => $request->court_name,
            'court_level'  => $request->court_level,
            'hearing_date' => $request->hearing_date,
            'hearing_time' => $request->hearing_time,
            'status'       => 'In Progress'
        ]);

        return redirect()
            ->route('court_clerk.filings')
            ->with('success', 'Court filing verified successfully.');
    }

    public function judgmentForm(LegalCase $legalCase)
    {
        return view('courtclerk.judgments.show',compact('legalCase'));
    }

    public function publishJudgment(Request $request, LegalCase $legalCase)
    {
        $request->validate(['judgment'=>'required']);

        $legalCase->update([
            'judgment'=>$request->judgment,
            'judgment_date'=>today(),
            'status'=>'Resolved'
        ]);

        return redirect()
            ->route('court_clerk.filings')
            ->with('success','Judgment published successfully.');
    }

    public function hearingForm(LegalCase $legalCase)
    {
        return view('courtclerk.hearings.show', compact('legalCase'));
    }

    public function scheduleHearing(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'hearing_date' => 'required|date',
            'hearing_time' => 'required',
            'court_name' => 'required',
            'court_level' => 'required',
        ]);

        $legalCase->update([
            'hearing_date' => $request->hearing_date,
            'hearing_time' => $request->hearing_time,
            'court_name' => $request->court_name,
            'court_level' => $request->court_level,
            'status' => 'In Progress'
        ]);

        return redirect()
            ->route('court_clerk.filings')
            ->with('success', 'Hearing scheduled successfully.');
    }
}