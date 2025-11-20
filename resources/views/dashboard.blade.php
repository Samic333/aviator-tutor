@extends('layouts.app')

@section('content')
<style>
    .dash-shell main {
        max-width: 1120px;
        margin: 0 auto;
        padding: 30px clamp(16px, 5vw, 60px) 60px;
    }
    .heading h1 {
        font-size: clamp(2rem, 4vw, 2.75rem);
        margin: 4px 0;
    }
    .heading p {
        color: #6b7280;
        max-width: 640px;
    }
    .grid {
        display: grid;
        gap: 18px;
    }
    @media (min-width: 1024px) {
        .grid-lg-3 { grid-template-columns: repeat(3, 1fr); }
    }
    .card {
        border-radius: 24px;
        border: 1px solid #e5e7eb;
        background: #fff;
        box-shadow: 0 18px 35px rgba(15, 23, 42, 0.08);
        padding: 20px;
    }
    .stat-grid { display: grid; gap: 16px; }
    @media (min-width: 640px) {
        .stat-grid { grid-template-columns: repeat(3, 1fr); }
    }
    .stat-card {
        border-radius: 20px;
        border: 1px solid #e0ecff;
        padding: 16px;
        background: #fff;
        display: flex;
        flex-direction: column;
    }
    .stat-label {
        font-size: 0.75rem;
        color: #6b7280;
        letter-spacing: 0.06em;
        margin-bottom: 6px;
    }
    .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: #111827;
    }
    .stat-note {
        margin-top: 8px;
        color: #94a3b8;
        font-size: 0.78rem;
    }
    .next-lesson {
        border-radius: 24px;
        border: 1px solid #c7e0ff;
        background: linear-gradient(135deg, #eef6ff, #dbeafe);
        padding: 22px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .badge {
        font-size: 0.75rem;
        padding: 4px 10px;
        border-radius: 999px;
        border: 1px solid #93c5fd;
        color: #1d4ed8;
        background: rgba(255,255,255,0.7);
    }
    .quick-actions {
        margin-top: 26px;
    }
    .quick-actions .actions-grid {
        display: grid;
        gap: 14px;
    }
    @media (min-width: 640px) {
        .quick-actions .actions-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (min-width: 1024px) {
        .quick-actions .actions-grid { grid-template-columns: repeat(4, 1fr); }
    }
    .action-card {
        border-radius: 20px;
        border: 1px solid #e5e7eb;
        padding: 18px;
        background: #f8fafc;
        text-decoration: none;
        color: #0f172a;
        display: flex;
        flex-direction: column;
        gap: 6px;
        box-shadow: 0 10px 22px rgba(15, 23, 42, 0.06);
    }
    .action-card span {
        font-size: 0.85rem;
        color: #6b7280;
    }
    .btn-primary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.65rem 1.4rem;
        border-radius: 999px;
        background: #2563eb;
        color: #fff;
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        box-shadow: 0 12px 25px rgba(37, 99, 235, 0.3);
    }
</style>

<div class="dash-shell">
    <main>
        <div class="heading">
            <p style="text-transform: uppercase; font-weight: 600; color: #0ea5e9;">Dashboard</p>
            <h1>Welcome back, {{ Auth::user()->name ?? 'Pilot' }} ✈️</h1>
            <p>Manage your lessons, track your bookings, and connect with aviation tutors all in one place.</p>
        </div>

        <div class="grid grid-lg-3" style="gap: 20px; margin-bottom: 24px;">
            <div class="stat-grid card" style="grid-column: span 2;">
                <div class="stat-card">
                    <p class="stat-label">Lessons booked</p>
                    <p class="stat-value">0</p>
                    <p class="stat-note">Book your first session to see it here.</p>
                </div>
                <div class="stat-card">
                    <p class="stat-label">Tutors contacted</p>
                    <p class="stat-value">0</p>
                    <p class="stat-note">Browse tutors by aircraft, license or language.</p>
                </div>
                <div class="stat-card">
                    <p class="stat-label">Training hours</p>
                    <p class="stat-value">0h</p>
                    <p class="stat-note">Your completed lesson time appears here.</p>
                </div>
            </div>
            <div class="next-lesson card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px;">
                    <p style="font-size:0.9rem;font-weight:600;color:#1d4ed8;margin:0;text-transform:uppercase;">Next lesson</p>
                    <span class="badge">Coming soon</span>
                </div>
                <p style="margin:0;font-size:0.95rem;">You don't have any upcoming lessons yet.</p>
                <p style="margin-top:10px;font-size:0.82rem;color:#6b7280;">
                    Once you book a session, its date, time, and tutor will show up here so you're always ready.
                </p>
                <div style="margin-top:16px;">
                    <a class="btn-primary" href="{{ route('tutors.index') }}">Find a tutor now</a>
                </div>
            </div>
        </div>

        <div class="quick-actions card">
            <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:12px;">
                <h2 style="margin:0;">Quick actions</h2>
                <p style="margin:0;color:#6b7280;font-size:0.85rem;">Jump straight into the most common tasks.</p>
            </div>
            <div class="actions-grid">
                <a class="action-card" href="{{ route('tutors.index') }}">
                    <strong>Find tutors</strong>
                    <span>Browse aviation instructors by aircraft type, rating and language.</span>
                </a>
                <a class="action-card" href="{{ route('bookings.student') }}">
                    <strong>My bookings</strong>
                    <span>View upcoming and past lessons, reschedule or cancel if allowed.</span>
                </a>
                <a class="action-card" href="{{ route('tutor.profile.edit') }}">
                    <strong>Complete your profile</strong>
                    <span>Add your timezone, license level and learning goals so tutors can prepare.</span>
                </a>
                <a class="action-card" href="{{ route('tutor.dashboard.edit') }}">
                    <strong>Become a tutor</strong>
                    <span>Are you a captain, instructor or cabin crew trainer? Apply to teach on Aviator Tutor.</span>
                </a>
            </div>
        </div>
    </main>
</div>
@endsection
