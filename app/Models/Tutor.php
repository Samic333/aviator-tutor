<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'role',
        'headline',
        'bio',
        'country',
        'timezone',
        'hourly_rate',
        'currency',
        'aircraft_types',
        'subjects',
        'years_experience',
        'is_verified',
        'rating',
        'total_reviews',
    ];

    protected $casts = [
        'aircraft_types' => 'array',
        'subjects'       => 'array',
        'is_verified'    => 'boolean',
    ];
}
