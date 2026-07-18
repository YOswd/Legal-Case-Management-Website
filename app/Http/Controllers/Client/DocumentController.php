<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use App\Models\LegalDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

    public function index(LegalCase $legalCase)
    {
        abort_if($legalCase->client_id != auth()->id(),403);

        $documents = LegalDocument::where('legal_case_id',$legalCase->id)
            ->latest()
            ->get();

        return view('client.documents.index', compact(
            'legalCase',
            'documents'
        ));
    }

    public function store(Request $request, LegalCase $legalCase)
    {
        abort_if($legalCase->client_id != auth()->id(), 403);

        $request->validate([
            'title' => 'required|max:255',
            'document_type' => 'required|max:255',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:10240',
        ]);

        $path = $request->file('file')->store('legal_documents', 'public');

        LegalDocument::create([
            'legal_case_id' => $legalCase->id,
            'title' => $request->title,
            'document_type' => $request->document_type,
            'file_path' => $path,
            'uploaded_by' => auth()->id(),
        ]);

        return back()->with('success', 'Document uploaded successfully.');
    }

    public function download(LegalDocument $document)
    {
        return Storage::disk('public')
            ->download($document->file_path);
    }

    public function all()
    {
        $documents = LegalDocument::where('uploaded_by', auth()->id())
            ->latest()
            ->get();

        return view('client.documents.all', compact('documents'));
    }
}