<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;

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