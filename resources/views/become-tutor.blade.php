@extends('layouts.app')

@section('content')
<style>
    :root {
        --become-bg: #f3f4f6;
        --become-panel: #ffffff;
        --become-border: #e5e7eb;
        --become-text: #111827;
        --become-muted: #6b7280;
        --become-accent: #2563eb;
        --become-accent-soft: #e0f2fe;
    }
    .become-page {
        background: var(--become-bg);
        color: var(--become-text);
        font-family: "Inter", system-ui, sans-serif;
    }
    .become-main {
        max-width: 1100px;
        margin: 0 auto;
        padding: 50px clamp(16px, 6vw, 80px) 90px;
    }
    .hero {
        background: linear-gradient(130deg, var(--become-accent-soft), #fef3c7);
        border: 1px solid #dbeafe;
        border-radius: 28px;
        box-shadow: 0 25px 55px rgba(15,23,42,0.08);
        padding: 40px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 28px;
        align-items: center;
    }
    .hero h1 { margin: 0 0 16px; font-size: clamp(2rem, 4vw, 3rem); }
    .hero p { margin: 0 0 18px; color: var(--become-muted); line-height: 1.6; }
    .hero-list { padding-left: 18px; color: var(--become-muted); }
    .hero-list li { margin-bottom: 6px; }
    .hero-card {
        background: var(--become-panel);
        border-radius: 20px;
        border: 1px solid var(--become-border);
        padding: 18px;
    }
    .cta {
        margin-top: 18px;
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }
    .btn {
        border: none;
        border-radius: 999px;
        padding: 0.75rem 1.4rem;
        font-weight: 600;
        text-decoration: none;
        background: var(--become-accent);
        color: #fff;
        box-shadow: 0 12px 25px rgba(37,99,235,0.25);
    }
    .btn-secondary {
        border: 1px solid var(--become-border);
        background: #fff;
        color: var(--become-text);
        box-shadow: none;
    }
    .grid {
        margin-top: 36px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 18px;
    }
    .card {
        background: var(--become-panel);
        border-radius: 22px;
        border: 1px solid var(--become-border);
        padding: 24px;
        box-shadow: 0 18px 40px rgba(15,23,42,0.06);
    }
    .card h3 { margin-top: 0; }
    .card ul { padding-left: 18px; color: var(--become-muted); }
    .become-footer {
        border-top: 1px solid var(--become-border);
        padding: 20px;
        text-align: center;
        color: var(--become-muted);
        margin-top: 40px;
    }
    @media (max-width: 640px) {
        .become-main { padding-inline: 16px; }
    }
</style>

<div class="become-page">
    <div class="become-main">
        <section class="hero">
            <div>
                <p style="color:var(--become-muted); font-weight:600; letter-spacing:0.2em;">FOR AVIATION PROFESSIONALS</p>
                <h1>Share your flight deck, cabin, tower, or hangar experience with students worldwide.</h1>
                <p>
                    Pilots, cabin crew, ATC specialists, engineers, and dispatchers can launch a premium tutoring profile on Aviator Tutor.
                    Coach cadets before their sim check, help crew with interviews, or guide engineers through exams&mdash;on your schedule.
                </p>
                <ul class="hero-list">
                    <li>Set your hourly rate, subjects, and availability.</li>
                    <li>Meet online from anywhere in the world.</li>
                    <li>Get discovered based on aircraft, airline, and language.</li>
                </ul>
                <div class="cta">
                    <a class="btn" href="{{ route('tutor.profile.edit') }}">Start building your profile</a>
                    <a class="btn btn-secondary" href="{{ route('bookings.tutor') }}">See booking requests</a>
                </div>
            </div>
            <div class="hero-card">
                <strong>Who teaches on Aviator Tutor?</strong>
                <ul>
                    <li>Airline captains and first officers.</li>
                    <li>Lead cabin crew and service instructors.</li>
                    <li>ATC supervisors and trainers.</li>
                    <li>Licensed maintenance engineers (B1/B2).</li>
                    <li>Dispatchers and ops controllers.</li>
                </ul>
                <p style="margin-top:10px; color:var(--become-muted);">
                    Once you complete your profile, an admin will review details before marking you as verified.
                </p>
            </div>
        </section>

        <section class="grid">
            <div class="card">
                <h3>Topics you can offer</h3>
                <ul>
                    <li>Type rating oral exams and simulator profiles.</li>
                    <li>ATPL / CPL theory refreshers.</li>
                    <li>Cabin crew service, safety, and interview drills.</li>
                    <li>ATC phraseology and emergency scenario coaching.</li>
                    <li>Maintenance module tutoring and troubleshooting walkthroughs.</li>
                </ul>
            </div>
            <div class="card">
                <h3>How payouts work</h3>
                <ul>
                    <li>Set your rate in your preferred currency.</li>
                    <li>Students pay per confirmed session.</li>
                    <li>Platform fee only applies when lessons occur.</li>
                    <li>Weekly payouts via common payment providers.</li>
                </ul>
            </div>
            <div class="card">
                <h3>Profile essentials</h3>
                <ul>
                    <li>Complete the tutor profile form (headline, bio, rates).</li>
                    <li>Add aircraft types, subjects, and years of experience.</li>
                    <li>Optionally link credentials or license documents.</li>
                    <li>Admins review before a verified badge is displayed.</li>
                </ul>
            </div>
        </section>
    </div>

    <footer class="become-footer">
        &copy; {{ date('Y') }} Aviator Tutor. Built by aviation professionals, for aviation professionals.
    </footer>
</div>
@endsection
