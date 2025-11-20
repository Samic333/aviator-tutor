@extends('layouts.app')

@section('content')
<style>
    .specialties-page {
        margin: 0 auto;
        max-width: 1000px;
        padding: 40px 6vw 80px;
        font-family: "Inter", system-ui, sans-serif;
        color: #0f172a;
        background: #f5f6fb;
    }
    .specialties-page h1 {
        font-size: clamp(2rem, 4vw, 3rem);
        margin-bottom: 10px;
    }
    .specialties-page p.lead {
        color: #6b7280;
        margin-bottom: 28px;
    }
    .specialties-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 18px;
    }
    .specialties-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        padding: 20px;
        box-shadow: 0 12px 30px rgba(15,23,42,0.05);
    }
    .specialties-card h3 {
        margin-top: 0;
    }
    .pill-row {
        margin-top: 30px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .pill {
        padding: 10px 16px;
        border-radius: 999px;
        background: rgba(15,23,42,0.07);
        color: #475569;
        font-weight: 600;
        display: inline-flex;
    }
</style>

<div class="specialties-page">
    <h1>Aviation specialties</h1>
    <p class="lead">
        Every tutor lists the exact aircraft, exams, and subjects they coach. Browse the most popular focus areas below.
    </p>
    <div class="specialties-grid">
        <div class="specialties-card">
            <h3>Type rating &amp; sim coaching</h3>
            <p>Full mock sim rides, flows, and failure management on aircraft like A320, B737, Q400, E-Jets, ATR.</p>
        </div>
        <div class="specialties-card">
            <h3>Cabin crew &amp; service</h3>
            <p>Interview prep, safety demos, CRM drills, and premium service routines with lead pursers.</p>
        </div>
        <div class="specialties-card">
            <h3>ATC &amp; dispatch</h3>
            <p>Phraseology refreshers, scenario practice, and dispatcher flight planning tutoring.</p>
        </div>
        <div class="specialties-card">
            <h3>Maintenance &amp; engineering</h3>
            <p>B1/B2 modules, troubleshooting pages, MEL/CDL case studies, and practical assessments.</p>
        </div>
    </div>

    <div class="pill-row">
        <span class="pill">ATPL / CPL Theory</span>
        <span class="pill">Simulator interview</span>
        <span class="pill">Airline assessments</span>
        <span class="pill">CRM / TEM</span>
        <span class="pill">English proficiency</span>
        <span class="pill">Safety &amp; security</span>
        <span class="pill">Technical refreshers</span>
    </div>
</div>
@endsection
