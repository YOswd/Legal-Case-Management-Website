<?php

namespace App\Http\Controllers;

use App\Models\LegalCase;
use App\Models\LegalDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function store(Request $request, LegalCase $legalCase)
    {
        $request->validate([
            'title'=>'required',
            'document_type'=>'required',
            'file'=>'required|mimes:pdf,doc,docx,jpg,png|max:5120'
        ]);

        $path = $request->file('file')->store('documents','public');

        LegalDocument::create([
            'legal_case_id'=>$legalCase->id,
            'title'=>$request->title,
            'document_type'=>$request->document_type,
            'file_path'=>$path,
            'uploaded_by'=>Auth::id()
        ]);

        return back()->with('success','Document uploaded.');
    }

    public function download(LegalDocument $document)
    {
        return response()->download(
            storage_path('app/public/'.$document->file_path)
        );
    }
}
