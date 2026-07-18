<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseRequest extends Model
{
    protected $fillable = [

        'client_id',
        'lawyer_id',
        'title',
        'description',
        'budget',
        'status',

    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function lawyer()
    {
        return $this->belongsTo(User::class, 'lawyer_id');
    }

    public function legalCase()
    {
        return $this->hasOne(LegalCase::class);
    }

    public function documents()
    {
        return $this->hasMany(LegalDocument::class);
    }
}