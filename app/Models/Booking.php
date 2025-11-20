<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tutor;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'tutor_id',
        'status',
        'scheduled_at',
        'duration_minutes',
        'price_usd',
        'notes',
        'meeting_link',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'price_usd' => 'decimal:2',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }
}
