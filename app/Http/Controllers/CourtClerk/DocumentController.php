<?php

namespace App\Http\Controllers\CourtClerk;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use App\Models\LegalDocument;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    public function index(LegalCase $legalCase)
    {
        $documents = LegalDocument::where('legal_case_id',$legalCase->id)
            ->with('uploader')
            ->latest()
            ->get();


        return view('courtclerk.documents.index', compact(
            'legalCase',
            'documents'
        ));
    }


    public function download(LegalDocument $document)
    {
        return Storage::disk('public')
            ->download($document->file_path);
    }

}