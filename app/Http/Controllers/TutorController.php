<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    /**
     * iTalki-style tutor listing with simple search & filters.
     */
    public function index(Request $request)
    {
        $query = Tutor::query();

        // Text search: name, headline, bio
        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('headline', 'like', "%{$q}%")
                    ->orWhere('bio', 'like', "%{$q}%");
            });
        }

        // Role filter: pilot, cabin_crew, atc, engineer, etc.
        if ($request->filled('role') && $request->input('role') !== 'any') {
            $query->where('role', $request->input('role'));
        }

        // Country filter
        if ($request->filled('country')) {
            $query->where('country', 'like', '%' . $request->input('country') . '%');
        }

        // Price range
        if ($request->filled('min_rate')) {
            $query->where('hourly_rate', '>=', (float) $request->input('min_rate'));
        }

        if ($request->filled('max_rate')) {
            $query->where('hourly_rate', '<=', (float) $request->input('max_rate'));
        }

        // Sorting
        $sort = $request->input('sort', 'rating');
        if ($sort === 'price_low') {
            $query->orderBy('hourly_rate', 'asc');
        } elseif ($sort === 'price_high') {
            $query->orderBy('hourly_rate', 'desc');
        } elseif ($sort === 'newest') {
            $query->orderBy('created_at', 'desc');
        } else { // rating (default)
            $query->orderByDesc('rating')->orderByDesc('total_reviews');
        }

        $tutors = $query->get();

        return view('tutors.index', [
            'tutors'  => $tutors,
            'filters' => [
                'q'        => $request->input('q', ''),
                'role'     => $request->input('role', 'any'),
                'country'  => $request->input('country', ''),
                'min_rate' => $request->input('min_rate', ''),
                'max_rate' => $request->input('max_rate', ''),
                'sort'     => $sort,
            ],
        ]);
    }

    /**
     * Single tutor profile page.
     */
    public function show($id)
    {
        $tutor = Tutor::findOrFail($id);

        return view('tutors.show', [
            'tutor' => $tutor,
        ]);
    }
}
