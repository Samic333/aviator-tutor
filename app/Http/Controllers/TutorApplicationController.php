<?php

namespace App\Http\Controllers;

use App\Models\TutorApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = Auth::user();
        $application = $user->tutorApplications()->latest()->first();

        return view('tutor.apply', compact('user', 'application'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'license_type'      => 'required|string|max:255',
            'primary_aircraft'  => 'nullable|string|max:255',
            'total_hours'       => 'nullable|integer|min:0',
            'instruction_hours' => 'nullable|integer|min:0',
            'country'           => 'nullable|string|max:255',
            'timezone'          => 'nullable|string|max:255',
            'about'             => 'required|string|max:5000',
        ]);

        TutorApplication::create([
            'user_id'           => $user->id,
            'status'            => 'pending',
            'license_type'      => $validated['license_type'],
            'primary_aircraft'  => $validated['primary_aircraft'] ?? null,
            'total_hours'       => $validated['total_hours'] ?? null,
            'instruction_hours' => $validated['instruction_hours'] ?? null,
            'country'           => $validated['country'] ?? null,
            'timezone'          => $validated['timezone'] ?? null,
            'about'             => $validated['about'],
        ]);

        return redirect()
            ->route('tutor.apply.thankyou')
            ->with('status', 'Your application has been submitted and is now pending review.');
    }

    public function thankyou()
    {
        return view('tutor.application_submitted');
    }
}
