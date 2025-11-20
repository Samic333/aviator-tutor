@php
    $aircraft = array_filter((array) ($tutor->aircraft_types ?? []));
    $subjects = array_filter((array) ($tutor->subjects ?? []));
    $hasRate = ! is_null($tutor->hourly_rate);
@endphp

@extends('layouts.app')

@section('content')
<style>
    .profile-shell main {
        max-width: 1120px;
        margin: 0 auto;
        padding: 32px 16px 60px;
    }
    .breadcrumb {
        font-size: 0.85rem;
        color: #6b7280;
        margin-bottom: 14px;
    }
    .breadcrumb a { color: #2563eb; text-decoration: none; }
    .profile-layout {
        display: grid;
        grid-template-columns: minmax(0, 1.9fr) minmax(0, 1.2fr);
        gap: 20px;
    }
    .card {
        background: #fff;
        border-radius: 18px;
        border: 1px solid #e5e7eb;
        box-shadow: 0 14px 35px rgba(15, 23, 42, 0.08);
        padding: clamp(18px, 4vw, 24px);
    }
    .profile-main h1 {
        margin: 0;
        font-size: clamp(1.7rem, 3vw, 2.2rem);
    }
    .muted {
        color: #6b7280;
        font-size: 0.9rem;
        margin: 6px 0 14px;
    }
    .headline {
        font-size: 1rem;
        font-weight: 500;
        margin-bottom: 12px;
    }
    .chip-row {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 12px;
    }
    .chip {
        padding: 5px 10px;
        border-radius: 999px;
        border: 1px solid #e5e7eb;
        background: #f9fafb;
        font-size: 0.78rem;
    }
    .section-title {
        margin: 18px 0 6px;
        font-size: 0.95rem;
        font-weight: 600;
    }
    .bio {
        line-height: 1.55;
        font-size: 0.95rem;
    }
    .details-list {
        list-style: none;
        padding: 0;
        margin: 16px 0 0;
        font-size: 0.9rem;
    }
    .details-list li {
        display: flex;
        justify-content: space-between;
        padding: 6px 0;
        border-bottom: 1px dashed #e5e7eb;
    }
    .details-list li span {
        color: #6b7280;
    }
    .price-main {
        font-size: 1.4rem;
        font-weight: 600;
    }
    .price-unit {
        font-size: 0.9rem;
        color: #6b7280;
        margin-left: 6px;
    }
    .badge-verified {
        display: inline-flex;
        align-items: center;
        padding: 4px 12px;
        border-radius: 999px;
        background: #ecfdf5;
        color: #166534;
        font-size: 0.78rem;
        font-weight: 600;
        margin-top: 10px;
    }
    form.booking-form {
        display: grid;
        gap: 14px;
        margin-top: 18px;
    }
    form.booking-form input,
    form.booking-form select,
    form.booking-form textarea {
        width: 100%;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        padding: 0.8rem 1rem;
        font-size: 0.95rem;
        font-family: inherit;
    }
    form.booking-form button {
        border: none;
        border-radius: 999px;
        padding: 0.9rem 1.4rem;
        font-size: 0.95rem;
        font-weight: 600;
        background: #2563eb;
        color: #fff;
        cursor: pointer;
        box-shadow: 0 12px 25px rgba(37, 99, 235, 0.25);
    }
    .alert {
        border-radius: 12px;
        padding: 10px 12px;
        font-size: 0.85rem;
        margin-bottom: 12px;
    }
    .alert-success {
        border: 1px solid rgba(16,185,129,0.3);
        background: rgba(16,185,129,0.12);
        color: #047857;
    }
    .alert-error {
        border: 1px solid rgba(239,68,68,0.3);
        background: rgba(239,68,68,0.15);
        color: #b91c1c;
    }
    .auth-note {
        font-size: 0.9rem;
        color: #6b7280;
        margin-top: 14px;
    }
    @media (max-width: 900px) {
        .profile-layout { grid-template-columns: minmax(0, 1fr); }
    }
</style>

<div class="profile-shell">
    <main>
        <div class="breadcrumb">
            <a href="{{ route('tutors.index') }}">All tutors</a> / {{ $tutor->name }}
        </div>

        <div class="profile-layout">
            <section class="card profile-main">
                <h1>{{ $tutor->name }}</h1>
                <p class="muted">
                    {{ ucfirst($tutor->role) }}
                    @if($tutor->country)
                        · {{ $tutor->country }}
                    @endif
                    @if($tutor->timezone)
                        · {{ $tutor->timezone }}
                    @endif
                </p>

                @if($tutor->headline)
                    <p class="headline">{{ $tutor->headline }}</p>
                @endif

                @if(!empty($subjects))
                    <h2 class="section-title">Subjects & focus</h2>
                    <div class="chip-row">
                        @foreach($subjects as $subject)
                            <span class="chip">{{ $subject }}</span>
                        @endforeach
                    </div>
                @endif

                @if(!empty($aircraft))
                    <h2 class="section-title">Aircraft</h2>
                    <div class="chip-row">
                        @foreach($aircraft as $type)
                            <span class="chip">{{ $type }}</span>
                        @endforeach
                    </div>
                @endif

                <h2 class="section-title">About this tutor</h2>
                <p class="bio">
                    {{ $tutor->bio ?: 'This tutor has not added a detailed bio yet.' }}
                </p>
            </section>

            <aside class="card">
                @if($hasRate)
                    <div class="price-main">
                        {{ $tutor->currency ?? 'USD' }} {{ number_format($tutor->hourly_rate, 0) }}
                        <span class="price-unit">per hour</span>
                    </div>
                @endif

                @if($tutor->is_verified)
                    <div class="badge-verified">Verified tutor</div>
                @endif

                <ul class="details-list">
                    @if($tutor->country)
                        <li><span>Based in</span><strong>{{ $tutor->country }}</strong></li>
                    @endif
                    @if($tutor->timezone)
                        <li><span>Timezone</span><strong>{{ $tutor->timezone }}</strong></li>
                    @endif
                    @if($tutor->years_experience)
                        <li><span>Experience</span><strong>{{ $tutor->years_experience }} yrs</strong></li>
                    @endif
                </ul>

                @if (session('status'))
                    <div class="alert alert-success" style="margin-top:14px;">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-error">
                        <strong>Please fix:</strong>
                        <ul style="margin:8px 0 0 16px; padding:0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @auth
                    @if($tutor->is_verified)
                        <form class="booking-form" method="POST" action="{{ route('bookings.store', $tutor->id) }}">
                            @csrf
                            <div>
                                <label for="scheduled_at">Preferred date & time</label>
                                <input type="datetime-local" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at') }}" required>
                            </div>
                            <div>
                                <label for="duration_minutes">Duration</label>
                                <select id="duration_minutes" name="duration_minutes" required>
                                    @foreach ([60, 90, 120] as $option)
                                        <option value="{{ $option }}" @selected(old('duration_minutes', 60) == $option)>
                                            {{ $option }} minutes
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="notes">Notes</label>
                                <textarea id="notes" name="notes" placeholder="Tell the tutor your goal">{{ old('notes') }}</textarea>
                            </div>
                            <button type="submit">Request session</button>
                        </form>
                    @else
                        <p class="auth-note">
                            This tutor is awaiting verification. Once approved you can request sessions.
                        </p>
                    @endif
                @else
                    <p class="auth-note">
                        Please <a href="{{ route('login') }}">sign in</a> or
                        <a href="{{ route('register') }}">create an account</a> to request a session.
                    </p>
                @endauth
            </aside>
        </div>
    </main>
</div>
@endsection
