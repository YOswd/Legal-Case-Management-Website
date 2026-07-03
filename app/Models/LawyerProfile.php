<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LawyerProfile extends Model
{
    protected $fillable = [
        'user_id',
        'photo',
        'specialization',
        'experience',
        'qualification',
        'bar_council_no',
        'consultation_fee',
        'bio',
        'phone',
        'address',
        'city',
        'availability',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}