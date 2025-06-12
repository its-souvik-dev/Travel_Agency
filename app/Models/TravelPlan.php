<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'destination',
        'travel_dates',
        'travelers',
        'budget',
        'activities',
        'notes'
    ];

    protected $casts = [
        'activities' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}