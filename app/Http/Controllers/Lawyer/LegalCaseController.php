<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use Illuminate\Http\Request;

class LegalCaseController extends Controller
{
    public function index()
    {
        $cases = LegalCase::with('client')
            ->where('lawyer_id', auth()->id())
            ->latest()
            ->get();

        return view('lawyer.cases.index', compact('cases'));
    }

    public function show(LegalCase $legalCase)
    {
        if ($legalCase->lawyer_id != auth()->id()) {
            abort(403);
        }

        $legalCase->load('client');
        return view('lawyer.cases.show', compact('legalCase'));
    }

    public function edit(LegalCase $legalCase)
    {
        if ($legalCase->lawyer_id != auth()->id()) {
            abort(403);
        }

        return view('lawyer.cases.edit', compact('legalCase'));
    }

    public function update(Request $request, LegalCase $legalCase)
    {
        if ($legalCase->lawyer_id != auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'case_type'   => 'required|in:Civil,Criminal,Family,Property',
            'priority'    => 'required|in:Low,Medium,High',
            'status'      => 'required|in:Pending,In Progress,Resolved,Closed',
            'court_name'  => 'required|string|max:255',
            'filing_date' => 'required|date',
        ]);

        $legalCase->update($validated);

        return redirect()
            ->route('lawyer.cases.show', $legalCase)
            ->with('success', 'Case updated successfully.');
    }
}