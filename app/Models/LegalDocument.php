<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LegalDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'legal_case_id',
        'case_request_id',
        'title',
        'document_type',
        'file_path',
        'uploaded_by'
    ];

    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }

    public function caseRequest()
    {
        return $this->belongsTo(CaseRequest::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class,'uploaded_by');
    }
}