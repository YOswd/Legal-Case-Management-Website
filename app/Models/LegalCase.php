<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    protected $fillable = [
        'client_id',
        'case_number',
        'title',
        'description',
        'case_type',
        'priority',
        'status',
        'filing_date',
        'court_name'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}