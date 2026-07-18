<?php

namespace App\Http\Controllers\Lawyer;

use App\Models\LegalCase;
use App\Models\LegalDocument;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(LegalCase $legalCase)
    {
        return view('lawyer.documents.index', compact('legalCase'));
    }

    public function store(Request $request, LegalCase $legalCase)
    {
        if ($legalCase->lawyer_id !== auth()->id()) { abort(403, 'Unauthorized.'); }

        if (in_array($legalCase->status, ['Resolved', 'Closed'])) {
        return back()->with(
            'error',
            'Documents cannot be uploaded because this case has been completed.');
        }

        $request->validate([
            'title'=>'required',
            'document_type'=>'required',
            'file'=>'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240'
        ]);

        $path = $request->file('file')->store('legal_documents','public');

        LegalDocument::create([
            'legal_case_id'=>$legalCase->id,
            'title'=>$request->title,
            'document_type'=>$request->document_type,
            'file_path'=>$path,
            'uploaded_by'=>auth()->id()
        ]);

        return back()->with('success','Document uploaded.');
    }

    public function download(LegalDocument $document)
    {
        return Storage::disk('public')->download($document->file_path);
    }
}