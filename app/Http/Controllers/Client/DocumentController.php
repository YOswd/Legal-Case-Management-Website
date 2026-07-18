<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\LegalCase;
use App\Models\LegalDocument;
use Illuminate\Support\Facades\Storage;

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


    public function download(LegalDocument $document)
    {
        return Storage::disk('public')
            ->download($document->file_path);
    }

}