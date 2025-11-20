@extends('layouts.app')

@section('content')
<style>
    :root {
        --bg: #f3f5fb;
        --panel: #ffffff;
        --border: #e5e7eb;
        --accent: #2563eb;
        --accent-soft: #dbeafe;
        --text-main: #0f172a;
        --text-muted: #6b7280;
        --hero-start: #e0f2ff;
        --hero-end: #f3f5fb;
    }
    * { box-sizing: border-box; }
    .landing-wrapper {
        background: var(--bg);
        color: var(--text-main);
        font-family: "Inter", system-ui, -apple-system, sans-serif;
    }
    .landing-main {
        max-width: 1140px;
        margin: 0 auto;
        padding: 24px 20px 60px;
    }
    .hero {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        align-items: center;
        padding: clamp(24px, 6vw, 48px);
        border-radius: 30px;
        border: 1px solid rgba(148,163,184,0.25);
        background: linear-gradient(135deg, var(--hero-start), var(--hero-end));
        box-shadow: 0 35px 70px rgba(15,23,42,0.12);
    }
    .hero h1 {
        font-size: clamp(2.3rem, 4vw, 3.4rem);
        margin-bottom: 14px;
    }
    .hero p {
        color: var(--text-muted);
        line-height: 1.6;
    }
    .hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 22px;
    }
    .btn {
        border-radius: 999px;
        border: 1px solid var(--border);
        padding: 0.75rem 1.5rem;
        font-size: 0.95rem;
        font-weight: 600;
        background: #fff;
        color: var(--text-main);
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .btn-primary {
        background: var(--accent);
        border-color: var(--accent);
        color: #fff;
        box-shadow: 0 15px 35px rgba(37, 99, 235, 0.25);
    }
    .hero-card-stack {
        display: grid;
        gap: 18px;
    }
    .mini-card {
        border-radius: 22px;
        border: 1px solid rgba(148,163,184,0.4);
        padding: 18px;
        background: var(--panel);
        box-shadow: 0 18px 40px rgba(15,23,42,0.12);
    }
    .mini-card h4 {
        margin: 0 0 4px;
    }
    .rating {
        font-weight: 600;
        color: #1d4ed8;
    }
    .lesson-card {
        display: flex;
        gap: 14px;
        align-items: center;
        background: #0f172a;
        color: #fff;
    }
    .pilot-icon {
        width: 44px;
        height: 44px;
        border-radius: 16px;
        background: rgba(255,255,255,0.15);
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    .specialties {
        margin-top: 40px;
        background: #0f172a;
        border-radius: 28px;
        padding: clamp(18px, 4vw, 32px);
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        justify-content: center;
    }
    .specialties .pill {
        padding: 10px 16px;
        border-radius: 999px;
        background: rgba(255,255,255,0.08);
        color: #fff;
        font-weight: 600;
        border: 1px solid rgba(255,255,255,0.2);
    }
    .section {
        margin-top: 56px;
        background: var(--panel);
        border-radius: 32px;
        border: 1px solid var(--border);
        padding: clamp(24px, 5vw, 40px);
        box-shadow: 0 30px 60px rgba(15,23,42,0.08);
    }
    .section h2 {
        margin-top: 0;
        font-size: clamp(1.8rem, 3vw, 2.7rem);
    }
    .section p {
        color: var(--text-muted);
        margin-bottom: 24px;
    }
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 18px;
    }
    .card {
        border-radius: 24px;
        border: 1px solid var(--border);
        padding: 20px;
        background: #f8fafc;
    }
    .role-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 20px;
    }
    .role-grid .card {
        background: #fff;
    }
    .benefits {
        list-style: none;
        margin: 0;
        padding-left: 0;
    }
    .benefits li {
        margin-bottom: 10px;
        padding-left: 20px;
        position: relative;
        color: var(--text-muted);
    }
    .benefits li::before {
        content: '\2022';
        position: absolute;
        left: 0;
        color: var(--accent);
    }
    .trust-panel {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 18px;
    }
    .trust-panel div {
        border-radius: 20px;
        border: 1px dashed rgba(37,99,235,0.3);
        padding: 18px;
        text-align: center;
        background: #eef2ff;
    }
    .landing-footer {
        margin: 60px auto 0;
        max-width: 1140px;
        padding: 28px 20px 50px;
        color: var(--text-muted);
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: space-between;
        border-top: 1px solid rgba(148,163,184,0.25);
    }
</style>

<div class="landing-wrapper">
    <div class="landing-main">
        <section id="browse" class="hero">
            <div>
                <h1>Train with real pilots and aviation professionals</h1>
                <p>
                    1-to-1 online sessions for type ratings, sim checks, ATPL refreshers, cabin crew interviews, and more.
                    Built by aviation professionals for cadets, rated pilots, cabin crew, ATC, and engineers.
                </p>
                <div class="hero-actions">
                    <a class="btn btn-primary" href="{{ route('tutors.index') }}">Find a tutor</a>
                    <a class="btn" href="{{ route('become-tutor') }}">Become a tutor</a>
                </div>
            </div>
            <div class="hero-card-stack">
                <div class="mini-card">
                    <h4>Capt. Elena Torres</h4>
                    <div class="rating">&#9733;&#9733;&#9733;&#9733;&#9733; 4.9 | A320 TRI</div>
                    <p style="margin:0;color:var(--text-muted);">Sim check prep &bull; $95/hr</p>
                </div>
                <div class="mini-card lesson-card">
                    <div class="pilot-icon">AT</div>
                    <div>
                        <strong>Lesson in progress</strong>
                        <div style="color:rgba(255,255,255,0.7); font-size:0.9rem;">
                            CRM and LOFT scenarios &bull; 45 min remaining
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="specialties" class="specialties">
            @foreach (['Type rating & sim prep', 'ATPL / CPL theory', 'Cabin crew interview', 'ATC phraseology', 'Maintenance B1/B2'] as $topic)
                <a class="pill" href="{{ route('tutors.index', ['q' => $topic]) }}">{{ $topic }}</a>
            @endforeach
        </section>

        <section id="how-it-works" class="section">
            <h2>How it works</h2>
            <p>Three simple steps to connect with verified aviation mentors.</p>
            <div class="cards">
                <div class="card">
                    <strong>1. Browse tutors</strong>
                    <p>Filter by aircraft type, experience, language, country, and hourly rate.</p>
                </div>
                <div class="card">
                    <strong>2. Send your request</strong>
                    <p>Explain your learning goal&mdash;sim check, oral exam, interview, CRM scenario, or cabin service.</p>
                </div>
                <div class="card">
                    <strong>3. Meet online 1-to-1</strong>
                    <p>Use your preferred video platform, share documents, and get tailored feedback.</p>
                </div>
            </div>
        </section>

        <section id="for-professionals" class="section">
            <h2>Why aviation pros choose Aviator Tutor</h2>
            <div class="role-grid">
                <div class="card">
                    <h3>For students & crews</h3>
                    <ul class="benefits">
                        <li>Sim check and type rating prep with current captains.</li>
                        <li>Airline interview coaching and HR panels.</li>
                        <li>Cabin crew service and safety refreshers.</li>
                        <li>ATPL/CPL exam tutoring and study plans.</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>For professionals</h3>
                    <ul class="benefits">
                        <li>Earn extra income with flexible scheduling.</li>
                        <li>Teach from anywhere&mdash;sessions are online.</li>
                        <li>Help the next generation of pilots and crew.</li>
                        <li>Build credibility with ratings and reviews.</li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="section">
            <h2>Trusted by aviation professionals</h2>
            <p>We are partnering with academies and airline mentors to deliver authentic training.</p>
            <div class="trust-panel">
                <div>Airline & ATO logos (coming soon)</div>
                <div>&ldquo;Built by aviation professionals&rdquo; &mdash; Aviator Tutor Team</div>
            </div>
        </section>
    </div>

    <footer class="landing-footer">
        <div>
            <strong>Aviator Tutor</strong>
            <p style="margin:6px 0 0; font-size:0.9rem;">&copy; {{ date('Y') }} Built by aviation professionals.</p>
        </div>
        <div>
            <a href="{{ route('specialties') }}">Specialties</a><br>
            <a href="#how-it-works">How it works</a><br>
            <a href="{{ route('become-tutor') }}">Become a tutor</a>
        </div>
        <div>
            <a href="#">About</a><br>
            <a href="#">Terms</a><br>
            <a href="#">Privacy</a><br>
            <a href="#">Contact</a>
        </div>
    </footer>
</div>
@endsection
