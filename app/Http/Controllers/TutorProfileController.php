<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TutorProfileController extends Controller
{
    public function edit(): View
    {
        $user = Auth::user();
        abort_unless($user, 403);

        $tutor = Tutor::where('user_id', $user->id)->first();

        if (! $tutor) {
            $tutor = new Tutor([
                'name' => $user->name,
                'role' => $user->role !== 'student' ? $user->role : null,
            ]);
        }

        return view('tutor.profile-edit', [
            'tutor' => $tutor,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        abort_unless($user, 403);

        $data = $request->validate([
            'headline' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'hourly_rate' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'size:3'],
            'country' => ['nullable', 'string', 'max:100'],
            'timezone' => ['nullable', 'string', 'max:80'],
            'years_experience' => ['nullable', 'integer', 'min:0', 'max:60'],
            'aircraft_types' => ['nullable', 'string'],
            'subjects' => ['nullable', 'string'],
            'license_number' => ['nullable', 'string', 'max:255'],
            'license_document_url' => ['nullable', 'string', 'max:255'],
        ]);

        $aircraft = array_filter(array_map('trim', explode(',', $data['aircraft_types'] ?? '')));
        $subjects = array_filter(array_map('trim', explode(',', $data['subjects'] ?? '')));

        $tutor = Tutor::where('user_id', $user->id)->first();

        if (! $tutor) {
            $tutor = new Tutor([
                'user_id' => $user->id,
                'name' => $user->name,
                'role' => $user->role !== 'student' ? $user->role : 'pilot',
            ]);
        }

        $tutor->headline = $data['headline'] ?? null;
        $tutor->bio = $data['bio'] ?? null;
        $tutor->hourly_rate = $data['hourly_rate'];
        $tutor->currency = strtoupper($data['currency']);
        $tutor->country = $data['country'] ?? null;
        $tutor->timezone = $data['timezone'] ?? null;
        $tutor->years_experience = $data['years_experience'] ?? null;
        $tutor->aircraft_types = $aircraft;
        $tutor->subjects = $subjects;
        $tutor->license_number = $data['license_number'] ?? null;
        $tutor->license_document_url = $data['license_document_url'] ?? null;

        $tutor->save();

        return redirect()
            ->route('tutor.profile.edit')
            ->with('success', 'Your tutor profile has been updated.');
    }
}
