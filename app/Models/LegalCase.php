<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_request_id',
        'client_id',
        'lawyer_id',
        'case_number',
        'title',
        'description',
        'case_type',
        'priority',
        'status',
        'filing_date',
        'court_name',
        'court_level',
        'hearing_date',
        'hearing_time',
        'appealed',
        'appeal_court',
        'appeal_date',
        'judgment',
        'judgment_date',
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function lawyer()
    {
        return $this->belongsTo(User::class, 'lawyer_id');
    }

    public function request()
    {
        return $this->belongsTo(CaseRequest::class, 'case_request_id');
    }

    public function documents()
    {
        return $this->hasMany(LegalDocument::class);
    }
}