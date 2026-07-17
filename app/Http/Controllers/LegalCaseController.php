<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Http\Requests\StoreLegalCaseRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LegalCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = LegalCase::with(['client', 'lawyer']);

        // Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('case_number', 'LIKE', '%' . $request->search . '%')
                  ->orWhere('title', 'LIKE', '%' . $request->search . '%');
            });
        }

        // Status Filter
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $cases = $query->latest()->paginate(10)->withQueryString();

        return view('admin.cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLegalCaseRequest $request)
    {
    // Get the latest case
    $lastCase = LegalCase::latest()->first();

    if ($lastCase) {
        $lastNumber = (int) substr($lastCase->case_number, -4);
        $nextNumber = $lastNumber + 1;
    } else {
        $nextNumber = 1;
    }

    $caseNumber = 'CASE-' . date('Y') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    LegalCase::create([
        'client_id' => Auth::id(),
        'case_number' => $caseNumber,
        'title' => $request->title,
        'description' => $request->description,
        'case_type' => $request->case_type,
        'priority' => $request->priority,
        'status' => 'Pending',
        'filing_date' => $request->filing_date,
        'court_name' => $request->court_name,
    ]);

    return redirect()
        ->route('cases.index')
        ->with('success', 'Case created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $case = LegalCase::findOrFail($id);

    return view('cases.edit', compact('case'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'case_type' => 'required',
        'priority' => 'required',
        'status' => 'required',
        'filing_date' => 'required|date',
        'court_name' => 'required|max:255',
    ]);

        $case = LegalCase::findOrFail($id);

        $case->update($request->all());

        return redirect()
            ->route('cases.index')
            ->with('success', 'Case updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $case = LegalCase::findOrFail($id);

       $case->delete();

       return redirect()
         ->route('cases.index')
         ->with('success', 'Case deleted successfully.');
    }
}
