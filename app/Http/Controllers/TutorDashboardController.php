<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TutorDashboardController extends Controller
{
    public function edit(): View
    {
        $user = Auth::user();
        abort_if(! $user, 403);

        $tutor = $user->tutor ?? new Tutor([
            'name' => $user->name,
            'country' => $user->country,
            'timezone' => $user->timezone,
        ]);

        return view('dashboard.tutor', [
            'user' => $user,
            'tutor' => $tutor,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        abort_if(! $user, 403);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'headline' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'role' => ['required', 'string', 'max:100'],
            'country' => ['nullable', 'string', 'max:100'],
            'timezone' => ['nullable', 'string', 'max:100'],
            'hourly_rate' => ['required', 'numeric', 'min:0'],
            'currency' => ['required', 'string', 'size:3'],
            'aircraft_types' => ['nullable', 'string'],
            'subjects' => ['nullable', 'string'],
            'years_experience' => ['nullable', 'integer', 'min:0', 'max:80'],
        ]);

        $user->update([
            'name' => $validated['name'],
            'country' => $validated['country'] ?? null,
            'timezone' => $validated['timezone'] ?? null,
            'role' => User::ROLE_TUTOR,
        ]);

        $tutor = $user->tutor ?: new Tutor(['user_id' => $user->id]);

        $tutor->fill([
            'name' => $validated['name'],
            'headline' => $validated['headline'],
            'bio' => $validated['bio'] ?? null,
            'role' => $validated['role'],
            'country' => $validated['country'] ?? null,
            'timezone' => $validated['timezone'] ?? null,
            'hourly_rate' => $validated['hourly_rate'],
            'currency' => strtoupper($validated['currency']),
            'aircraft_types' => $this->stringToArray($validated['aircraft_types'] ?? ''),
            'subjects' => $this->stringToArray($validated['subjects'] ?? ''),
            'years_experience' => $validated['years_experience'] ?? null,
        ])->save();

        return redirect()
            ->route('tutor.dashboard.edit')
            ->with('status', 'Tutor profile saved.');
    }

    private function stringToArray(?string $value): array
    {
        if (! $value) {
            return [];
        }

        return array_filter(array_map('trim', explode(',', $value)));
    }
}
