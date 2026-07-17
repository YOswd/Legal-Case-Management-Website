<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'legal_case_id',
        'title',
        'document_type',
        'file_path',
        'uploaded_by'
    ];

    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class,'uploaded_by');
    }
}