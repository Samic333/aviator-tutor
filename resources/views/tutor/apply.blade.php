@extends('layouts.app')

@section('content')
@php
    $countries = ['United States','Canada','United Kingdom','Australia','Kenya','Nigeria','South Africa','United Arab Emirates','Qatar','Singapore','India','Germany','France','Spain','Italy','Brazil','Mexico','Japan','Philippines','Other'];
    $selectedCountry = old('country', auth()->user()->country ?? '');
@endphp

<style>
    .apply-shell * { box-sizing: border-box; }
    .apply-shell label { font-weight: 600; font-size: 0.9rem; color: #0f172a; display: block; margin-bottom: 6px; }
    .apply-shell input,
    .apply-shell select,
    .apply-shell textarea {
        width: 100%;
        border-radius: 16px;
        border: 1px solid #e2e8f0;
        padding: 0.85rem 1rem;
        font-size: 1rem;
        font-family: inherit;
    }
    .apply-grid { display: grid; gap: 18px; }
    @media (min-width: 640px) { .apply-grid-2 { grid-template-columns: repeat(2,minmax(0,1fr)); } .apply-grid-3 { grid-template-columns: repeat(3,minmax(0,1fr)); } }
</style>

<div class="apply-shell" style="max-width:1040px;margin:0 auto;padding:40px clamp(16px,6vw,72px) 80px;">
    <section style="background:linear-gradient(135deg,#e4f5ff,#f3f6fb);border-radius:32px;padding:36px;border:1px solid #e0ecff;box-shadow:0 25px 60px rgba(15,23,42,0.08);margin-bottom:28px;">
        <p style="text-transform:uppercase;font-size:12px;font-weight:600;color:#0284c7;letter-spacing:0.08em;margin:0;">Become a tutor</p>
        <h1 style="font-size:clamp(2rem,4vw,2.7rem);margin:6px 0;">Apply to teach on Aviator Tutor</h1>
        <p style="color:#64748b;max-width:640px;">Share your aviation experience so we can verify your profile. Approved tutors appear in search results for cadets, pilots, cabin crew, ATC and engineers.</p>
    </section>

    @if(session('status'))
        <div style="margin-bottom:18px;padding:14px;border-radius:18px;border:1px solid rgba(16,185,129,0.3);background:rgba(16,185,129,0.12);color:#047857;font-size:0.92rem;">
            {{ session('status') }}
        </div>
    @endif

    <section style="background:#fff;border-radius:32px;border:1px solid #e5e7eb;padding:32px 28px;box-shadow:0 20px 45px rgba(15,23,42,0.08);">
        <form action="{{ route('tutor.apply.store') }}" method="POST" style="display:grid;gap:22px;">
            @csrf

            <div class="apply-grid apply-grid-2">
                <div>
                    <label>License type *</label>
                    <input type="text" name="license_type" value="{{ old('license_type') }}" required>
                    @error('license_type')<p style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label>Primary aircraft</label>
                    <input type="text" name="primary_aircraft" value="{{ old('primary_aircraft') }}" placeholder="Q400, A320, B737...">
                </div>
            </div>

            <div class="apply-grid apply-grid-3">
                <div>
                    <label>Total flight hours</label>
                    <input type="number" name="total_hours" value="{{ old('total_hours') }}">
                </div>
                <div>
                    <label>Instruction hours</label>
                    <input type="number" name="instruction_hours" value="{{ old('instruction_hours') }}">
                </div>
                <div>
                    <label>Timezone</label>
                    <input type="text" name="timezone" id="apply-timezone" value="{{ old('timezone', auth()->user()->timezone ?? '') }}" placeholder="Africa/Nairobi">
                </div>
            </div>

            <div class="apply-grid apply-grid-2">
                <div>
                    <label>Country</label>
                    <select name="country">
                        <option value="">Select country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country }}" @selected($selectedCountry === $country)>{{ $country }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label>Tell us about your experience *</label>
                <textarea name="about" rows="5" required>{{ old('about') }}</textarea>
                @error('about')<p style="color:#dc2626;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                <p style="font-size:0.8rem;color:#94a3b8;margin-top:6px;">Mention airlines/ATOs, aircraft you fly, sim/LOFT roles, CRM or interview coaching experience, etc.</p>
            </div>

            <div style="padding:16px;border-radius:20px;background:#f8fafc;border:1px dashed #cbd5f5;color:#475569;font-size:0.85rem;">
                After approval, you can set your hourly rate, intro video, and availability. We’ll email you once the review is complete.
            </div>

            <div style="display:flex;justify-content:flex-end;">
                <button type="submit" style="border:none;border-radius:999px;padding:0.95rem 1.6rem;font-size:0.95rem;font-weight:600;background:linear-gradient(120deg,#2563eb,#3b82f6);color:#fff;box-shadow:0 15px 30px rgba(37,99,235,0.25);cursor:pointer;">
                    Submit application
                </button>
            </div>
        </form>
    </section>
</div>

<script>
    (function () {
        const tzInput = document.getElementById('apply-timezone');
        if (tzInput && (!tzInput.value || tzInput.value.trim() === '')) {
            tzInput.value = Intl.DateTimeFormat().resolvedOptions().timeZone;
        }
    })();
</script>
@endsection
