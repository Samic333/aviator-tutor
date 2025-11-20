<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TutorApplication extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'license_type',
        'primary_aircraft',
        'total_hours',
        'instruction_hours',
        'country',
        'timezone',
        'about',
        'admin_notes',
        'reviewed_at',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
