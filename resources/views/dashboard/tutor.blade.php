@extends('layouts.app')

@section('content')
<style>
    .tutor-dash * { box-sizing: border-box; }
    .tutor-dash main {
        max-width: 960px;
        margin: 0 auto;
        padding: 32px clamp(16px,5vw,40px) 60px;
    }
    .card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 24px;
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
        padding: clamp(20px, 5vw, 36px);
    }
    h1 {
        margin: 0 0 10px;
        font-size: clamp(1.6rem, 3vw, 2.2rem);
    }
    p.lead {
        margin: 0 0 24px;
        color: #6b7280;
    }
    form {
        display: grid;
        gap: 18px;
    }
    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #0f172a;
    }
    input,
    textarea,
    select {
        width: 100%;
        border: 1px solid #e5e7eb;
        border-radius: 14px;
        padding: 0.85rem 1rem;
        font-size: 1rem;
        font-family: inherit;
        background: #fff;
    }
    textarea { min-height: 140px; resize: vertical; }
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px;
    }
    .flash {
        padding: 0.9rem 1rem;
        border-radius: 14px;
        border: 1px solid;
        margin-bottom: 18px;
    }
    .flash-success {
        border-color: rgba(21,128,61,0.3);
        background: rgba(21,128,61,0.12);
        color: #15803d;
    }
    .flash-error {
        border-color: rgba(185,28,28,0.3);
        background: rgba(185,28,28,0.08);
        color: #b91c1c;
    }
    button[type="submit"] {
        border: none;
        border-radius: 999px;
        padding: 0.95rem 1.6rem;
        font-size: 1rem;
        font-weight: 600;
        background: #2563eb;
        color: #fff;
        cursor: pointer;
        justify-self: flex-start;
        box-shadow: 0 15px 30px rgba(37, 99, 235, 0.25);
    }
</style>

<div class="tutor-dash">
    <main>
        <div class="card">
            <h1>Set up your tutor profile</h1>
            <p class="lead">
                Share your aircraft experience, specialties, and hourly rate so students can find and book you.
            </p>

            @if (session('status'))
                <div class="flash flash-success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="flash flash-error">
                    <strong>Please fix the following:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('tutor.dashboard.update') }}">
                @csrf

                <div class="grid">
                    <div>
                        <label for="name">Full name *</label>
                        <input id="name" name="name" value="{{ old('name', $tutor->name) }}" required>
                    </div>
                    <div>
                        <label for="role">Role *</label>
                        <input id="role" name="role" value="{{ old('role', $tutor->role) }}" placeholder="Pilot, Cabin Crew, ATC" required>
                    </div>
                    <div>
                        <label for="country">Country</label>
                        <input id="country" name="country" value="{{ old('country', $tutor->country) }}">
                    </div>
                    <div>
                        <label for="timezone">Timezone</label>
                        <input id="timezone" name="timezone" value="{{ old('timezone', $tutor->timezone) }}">
                    </div>
                </div>

                <div>
                    <label for="headline">Profile headline *</label>
                    <input id="headline" name="headline" value="{{ old('headline', $tutor->headline) }}" required>
                </div>

                <div>
                    <label for="bio">Bio / Experience</label>
                    <textarea id="bio" name="bio" placeholder="Share aircraft, airlines, sim experience, interview prep, etc.">{{ old('bio', $tutor->bio) }}</textarea>
                </div>

                <div class="grid">
                    <div>
                        <label for="hourly_rate">Hourly rate *</label>
                        <input type="number" step="0.01" min="0" id="hourly_rate" name="hourly_rate" value="{{ old('hourly_rate', $tutor->hourly_rate) }}" required>
                    </div>
                    <div>
                        <label for="currency">Currency (ISO) *</label>
                        <input id="currency" name="currency" value="{{ old('currency', $tutor->currency ?? 'USD') }}" maxlength="3" required>
                    </div>
                    <div>
                        <label for="years_experience">Years of experience</label>
                        <input type="number" min="0" id="years_experience" name="years_experience" value="{{ old('years_experience', $tutor->years_experience) }}">
                    </div>
                </div>

                <div class="grid">
                    <div>
                        <label for="aircraft_types">Aircraft types (comma separated)</label>
                        <input id="aircraft_types" name="aircraft_types" value="{{ old('aircraft_types', implode(', ', (array) $tutor->aircraft_types)) }}" placeholder="A320, B737, Q400">
                    </div>
                    <div>
                        <label for="subjects">Subjects & focus (comma separated)</label>
                        <input id="subjects" name="subjects" value="{{ old('subjects', implode(', ', (array) $tutor->subjects)) }}" placeholder="Sim prep, ATPL theory, cabin interview">
                    </div>
                </div>

                <div class="grid">
                    <div>
                        <label for="license_number">License number</label>
                        <input id="license_number" name="license_number" value="{{ old('license_number', $tutor->license_number) }}">
                    </div>
                    <div>
                        <label for="license_document_url">License document URL</label>
                        <input id="license_document_url" name="license_document_url" placeholder="Paste a link to your credential" value="{{ old('license_document_url', $tutor->license_document_url) }}">
                    </div>
                </div>

                <button type="submit">Save tutor profile</button>
            </form>
        </div>
    </main>
</div>
@endsection
