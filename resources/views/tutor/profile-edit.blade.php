@extends('layouts.app')

@section('content')
<style>
    :root {
        --bg: #f3f5fb;
        --panel: #ffffff;
        --border: #e5e7eb;
        --text: #0f172a;
        --muted: #6b7280;
        --accent: #2563eb;
    }
    * { box-sizing: border-box; }
    .tutor-shell {
        background: var(--bg);
        color: var(--text);
        font-family: "Inter", system-ui, sans-serif;
    }
    .tutor-main {
        max-width: 1040px;
        margin: 0 auto;
        padding: 30px clamp(16px, 5vw, 60px) 60px;
    }
    .header-card,
    .form-card {
        border-radius: 28px;
        border: 1px solid var(--border);
        background: var(--panel);
        box-shadow: 0 20px 45px rgba(15, 23, 42, 0.08);
        padding: clamp(22px, 5vw, 36px);
    }
    .header-card h1 {
        margin: 0 0 6px;
        font-size: clamp(2rem, 4vw, 2.4rem);
    }
    .header-grid {
        display: grid;
        gap: 18px;
        margin-top: 18px;
    }
    @media (min-width: 720px) {
        .header-grid { grid-template-columns: repeat(4, minmax(0, 1fr)); }
    }
    .header-stat {
        border-radius: 20px;
        border: 1px solid #e0ecff;
        padding: 16px;
        background: #f8fbff;
    }
    form {
        margin-top: 24px;
        display: grid;
        gap: 20px;
    }
    label {
        display: block;
        font-weight: 600;
        font-size: 0.9rem;
        margin-bottom: 6px;
    }
    input,
    select,
    textarea {
        width: 100%;
        border-radius: 14px;
        border: 1px solid var(--border);
        padding: 0.85rem 1rem;
        font-size: 1rem;
        font-family: inherit;
        background: #fff;
        color: var(--text);
    }
    textarea { min-height: 150px; resize: vertical; }
    .grid {
        display: grid;
        gap: 18px;
    }
    @media (min-width: 640px) {
        .grid-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .grid-3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
    }
    .note {
        margin-top: 12px;
        color: var(--muted);
        font-size: 0.85rem;
    }
    button[type="submit"] {
        border: none;
        border-radius: 999px;
        padding: 0.95rem 1.8rem;
        font-size: 1rem;
        font-weight: 600;
        background: var(--accent);
        color: #fff;
        cursor: pointer;
        box-shadow: 0 15px 30px rgba(37, 99, 235, 0.25);
    }
    .status {
        padding: 0.85rem 1rem;
        border-radius: 16px;
        background: rgba(16,185,129,0.12);
        border: 1px solid rgba(16,185,129,0.3);
        color: #047857;
    }
</style>

<div class="tutor-shell">
    <div class="tutor-main">
        <div class="header-card">
            <p style="text-transform:uppercase;font-size:0.75rem;font-weight:600;color:#0ea5e9;margin:0;">Tutor dashboard</p>
            <h1>My tutor profile</h1>
            <p style="color:var(--muted);max-width:640px;">
                Complete your profile so students can find you by aircraft, specialties, languages and availability.
            </p>
            <div class="header-grid">
                <div class="header-stat">
                    <p style="margin:0;font-size:0.75rem;color:var(--muted);letter-spacing:0.04em;">Profile status</p>
                    <strong style="font-size:1.1rem;">{{ $tutor->headline ? 'In progress' : 'Draft' }}</strong>
                </div>
                <div class="header-stat">
                    <p style="margin:0;font-size:0.75rem;color:var(--muted);letter-spacing:0.04em;">Verification</p>
                    <strong style="font-size:1.1rem;">{{ $tutor->is_verified ? 'Verified' : 'Pending' }}</strong>
                </div>
                <div class="header-stat">
                    <p style="margin:0;font-size:0.75rem;color:var(--muted);letter-spacing:0.04em;">Hourly rate</p>
                    <strong style="font-size:1.1rem;">{{ $tutor->currency ?? 'USD' }} {{ number_format($tutor->hourly_rate ?? 0, 2) }}</strong>
                </div>
                <div class="header-stat">
                    <p style="margin:0;font-size:0.75rem;color:var(--muted);letter-spacing:0.04em;">Subjects added</p>
                    <strong style="font-size:1.1rem;">{{ count((array) $tutor->subjects) }}</strong>
                </div>
            </div>
        </div>

        <div class="form-card">
            @if (session('success'))
                <div class="status">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('tutor.profile.update') }}">
                @csrf

                <div>
                    <label for="headline">Headline</label>
                    <input id="headline" type="text" name="headline" value="{{ old('headline', $tutor->headline) }}" placeholder="A320 Captain & Type Rating Instructor">
                </div>

                <div>
                    <label for="bio">Bio / Experience</label>
                    <textarea id="bio" name="bio" placeholder="Share your airline background, aircraft expertise, sim prep focus, interviews, CRM scenarios, etc.">{{ old('bio', $tutor->bio) }}</textarea>
                </div>

                <div class="grid grid-3">
                    <div>
                        <label for="hourly_rate">Hourly rate</label>
                        <input id="hourly_rate" type="number" step="1" min="0" name="hourly_rate" value="{{ old('hourly_rate', $tutor->hourly_rate ?? 0) }}" required>
                    </div>
                    <div>
                        <label for="currency">Currency</label>
                        <input id="currency" type="text" name="currency" value="{{ old('currency', $tutor->currency ?? 'USD') }}" maxlength="3" required>
                    </div>
                    <div>
                        <label for="years_experience">Years of experience</label>
                        <input id="years_experience" type="number" min="0" name="years_experience" value="{{ old('years_experience', $tutor->years_experience) }}">
                    </div>
                </div>

                @php
                    $countries = ['United States','Canada','United Kingdom','Australia','Kenya','Nigeria','South Africa','India','United Arab Emirates','Qatar','Singapore','New Zealand','Germany','France','Spain','Italy','Mexico','Brazil','Japan','China','Philippines','Other'];
                    $selectedCountry = old('country', $tutor->country);
                    $aircraftOptions = ['A320','A330','A350','B737','B747','B777','B787','Q400','ATR72','Embraer 170/190','CRJ700/900','Helicopter','GA / Business Jet','Cabin Crew'];
                    $selectedAircraft = collect(explode(',', (string) old('aircraft_types', is_array($tutor->aircraft_types) ? implode(',', $tutor->aircraft_types) : $tutor->aircraft_types)))->map(fn($val) => trim($val))->filter()->values();
                @endphp

                <div class="grid grid-2">
                    <div>
                        <label for="country">Country</label>
                        <select id="country" name="country">
                            <option value="">Select country</option>
                            @foreach($countries as $country)
                                <option value="{{ $country }}" @selected($selectedCountry === $country)>{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="timezone_display">Timezone</label>
                        <input id="timezone_display" type="text" value="{{ old('timezone', $tutor->timezone) }}" readonly>
                        <input id="timezone" type="hidden" name="timezone" value="{{ old('timezone', $tutor->timezone) }}">
                        <p class="note">We detect your timezone automatically. You can adjust in account settings.</p>
                    </div>
                </div>

                <div>
                    <label>Aircraft types</label>
                    <div style="display:grid;gap:10px;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));">
                        @foreach($aircraftOptions as $option)
                            <label style="display:flex;align-items:center;gap:8px;font-size:0.9rem;color:var(--muted);">
                                <input type="checkbox" value="{{ $option }}" class="aircraft-option" @checked($selectedAircraft->contains($option))>
                                {{ $option }}
                            </label>
                        @endforeach
                    </div>
                    <input type="hidden" id="aircraft_types" name="aircraft_types" value="{{ old('aircraft_types', implode(', ', $selectedAircraft->toArray())) }}">
                    <p class="note">Select all that apply. You can still add custom types in your bio.</p>
                </div>

                <div>
                    <label for="subjects">Subjects</label>
                    <input id="subjects" type="text" name="subjects" placeholder="ATPL theory, sim prep, cabin crew interview" value="{{ old('subjects', implode(', ', (array) $tutor->subjects)) }}">
                </div>

                <div class="grid grid-2">
                    <div>
                        <label for="license_number">License number</label>
                        <input id="license_number" type="text" name="license_number" value="{{ old('license_number', $tutor->license_number) }}">
                    </div>
                    <div>
                        <label for="license_document_url">License document URL</label>
                        <input id="license_document_url" type="text" name="license_document_url" placeholder="Link to credential or cloud folder" value="{{ old('license_document_url', $tutor->license_document_url) }}">
                    </div>
                </div>

                <button type="submit">Save profile</button>
                <p class="note">
                    After you save, our team may review and verify your profile before students see you as verified.
                </p>
            </form>
        </div>
    </div>
</div>

<script>
    (function () {
        const timezoneInput = document.getElementById('timezone');
        const timezoneDisplay = document.getElementById('timezone_display');
        if (timezoneInput && (!timezoneInput.value || timezoneInput.value.trim() === '')) {
            const tz = Intl.DateTimeFormat().resolvedOptions().timeZone;
            timezoneInput.value = tz;
            if (timezoneDisplay) {
                timezoneDisplay.value = tz;
            }
        }

        const checkboxes = document.querySelectorAll('.aircraft-option');
        const hiddenField = document.getElementById('aircraft_types');
        function updateAircraftField() {
            const selected = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);
            hiddenField.value = selected.join(', ');
        }
        checkboxes.forEach(cb => cb.addEventListener('change', updateAircraftField));
    })();
</script>
@endsection
