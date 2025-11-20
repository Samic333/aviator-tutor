<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tutor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function studentIndex(): View
    {
        $userId = Auth::id();
        abort_unless($userId, 403);

        $bookings = Booking::with('tutor')
            ->where('student_id', $userId)
            ->orderByDesc('scheduled_at')
            ->get();

        return view('bookings.student', [
            'bookings' => $bookings,
        ]);
    }

    public function tutorIndex(): View
    {
        $userId = Auth::id();
        abort_unless($userId, 403);

        $tutorIds = Tutor::where('user_id', $userId)->pluck('id');

        $bookings = Booking::with(['student', 'tutor'])
            ->whereIn('tutor_id', $tutorIds)
            ->orderByDesc('scheduled_at')
            ->get();

        return view('bookings.tutor', [
            'bookings' => $bookings,
        ]);
    }

    public function store(Request $request, int $tutorId): RedirectResponse
    {
        $studentId = Auth::id();
        abort_unless($studentId, 403);

        $data = $request->validate([
            'scheduled_at' => ['required', 'date'],
            'duration_minutes' => ['required', 'integer', 'min:30', 'max:180'],
            'notes' => ['nullable', 'string'],
        ]);

        $tutor = Tutor::findOrFail($tutorId);

        Booking::create([
            'student_id' => $studentId,
            'tutor_id' => $tutor->id,
            'scheduled_at' => $data['scheduled_at'],
            'duration_minutes' => $data['duration_minutes'],
            'price_usd' => $tutor->hourly_rate ?? 0,
            'status' => 'pending',
            'notes' => $data['notes'] ?? null,
        ]);

        return redirect()
            ->route('tutors.show', $tutor->id)
            ->with('status', 'Your booking request has been sent.');
    }
}
