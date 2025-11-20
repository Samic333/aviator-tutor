<?php

namespace App\Http\Controllers;

use App\Models\TutorApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminTutorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $applications = TutorApplication::with('user')
            ->latest()
            ->paginate(20);

        return view('admin.tutors.index', compact('applications'));
    }

    public function show(TutorApplication $application)
    {
        $application->load('user');

        return view('admin.tutors.show', compact('application'));
    }

    public function approve(TutorApplication $application, Request $request)
    {
        $application->status = 'approved';
        $application->admin_notes = $request->input('admin_notes');
        $application->reviewed_at = Carbon::now();
        $application->save();

        $user = $application->user;
        $user->is_tutor = true;
        if (!$user->timezone && $application->timezone) {
            $user->timezone = $application->timezone;
        }
        $user->save();

        return redirect()
            ->route('admin.tutors.index')
            ->with('status', 'Application approved and user marked as tutor.');
    }

    public function reject(TutorApplication $application, Request $request)
    {
        $application->status = 'rejected';
        $application->admin_notes = $request->input('admin_notes');
        $application->reviewed_at = Carbon::now();
        $application->save();

        return redirect()
            ->route('admin.tutors.index')
            ->with('status', 'Application rejected.');
    }
}
