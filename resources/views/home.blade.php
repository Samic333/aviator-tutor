@extends('layouts.app')

@section('content')
<style>
/* Simple, clean homepage design just for this view */

.at-home {
    max-width: 1120px;
    margin: 0 auto;
    padding: 2.5rem 1.5rem 3.5rem;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text", sans-serif;
    color: #0f172a;
}

.at-home-hero {
    display: grid;
    grid-template-columns: minmax(0, 3fr) minmax(0, 2.5fr);
    gap: 2.5rem;
    align-items: center;
    margin-bottom: 3rem;
}

.at-home-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 0.45rem;
    padding: 0.2rem 0.8rem;
    border-radius: 999px;
    background: rgba(37, 99, 235, 0.06);
    color: #2563eb;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    font-weight: 600;
    margin-bottom: 0.8rem;
}

.at-home h1 {
    font-size: clamp(2rem, 3vw + 1.2rem, 2.9rem);
    line-height: 1.05;
    margin: 0 0 1rem;
}

.at-home-lead {
    font-size: 1rem;
    color: #6b7280;
    margin-bottom: 1.7rem;
    max-width: 32rem;
}

.at-home-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    margin-bottom: 1.25rem;
}

.at-btn {
    border-radius: 999px;
    border: 1px solid transparent;
    padding: 0.5rem 1.1rem;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.35rem;
    transition: all 0.18s ease-out;
    text-decoration: none;
}

.at-btn-primary {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #ffffff;
    box-shadow: 0 18px 45px rgba(37, 99, 235, 0.4);
}

.at-btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 22px 60px rgba(37, 99, 235, 0.55);
}

.at-btn-outline {
    background-color: transparent;
    border-color: #cbd5f5;
    color: #1e293b;
}

.at-btn-outline:hover {
    background-color: #eef2ff;
}

.at-home-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.2rem;
    font-size: 0.85rem;
    color: #6b7280;
}

.at-home-meta strong {
    color: #0f172a;
}

.at-hero-card {
    background: radial-gradient(circle at top left, #eff6ff 0, #ffffff 65%);
    border-radius: 1.5rem;
    padding: 1.5rem;
    box-shadow: 0 20px 60px rgba(15, 23, 42, 0.12);
    border: 1px solid rgba(148, 163, 184, 0.35);
}

.at-hero-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.at-hero-tutor {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.at-avatar {
    width: 40px;
    height: 40px;
    border-radius: 999px;
    background: linear-gradient(135deg, #2563eb, #38bdf8);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.9rem;
}

.at-helptext {
    font-size: 0.8rem;
    color: #6b7280;
}

.at-chip-row {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
    margin-bottom: 0.75rem;
}

.at-chip {
    font-size: 0.75rem;
    padding: 0.18rem 0.5rem;
    border-radius: 999px;
    background-color: #e0edff;
    color: #2563eb;
}

.at-section {
    margin-top: 2.75rem;
}

.at-section-header {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.at-section-title {
    font-size: 1.35rem;
    font-weight: 600;
}

.at-section-subtitle {
    font-size: 0.9rem;
    color: #6b7280;
    max-width: 26rem;
}

.at-grid-3 {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 1.25rem;
}

.at-card {
    background-color: #ffffff;
    border-radius: 1.1rem;
    padding: 1.25rem;
    border: 1px solid #e5e7eb;
    box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
}

.at-card h3 {
    margin-top: 0;
    margin-bottom: 0.4rem;
    font-size: 1rem;
}

.at-card p {
    margin: 0;
    font-size: 0.9rem;
    color: #6b7280;
}

/* Responsive */
@media (max-width: 900px) {
    .at-home-hero {
        grid-template-columns: minmax(0, 1fr);
    }
}

@media (max-width: 640px) {
    .at-home {
        padding-inline: 1.2rem;
    }
    .at-home-actions {
        flex-direction: column;
        align-items: stretch;
    }
    .at-btn {
        width: 100%;
        justify-content: center;
    }
    .at-grid-3 {
        grid-template-columns: minmax(0, 1fr);
    }
}

/* Header styling override */
header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0.85rem 1.75rem;
    background-color: #ffffff;
    border-bottom: 1px solid #e5e7eb;
    font-size: 1.05rem;
}

header a {
    text-decoration: none;
    color: #4b5563;
    font-weight: 500;
}

header a:hover {
    color: #111827;
}

/* If the nav links are wrapped in a <nav> or a simple container, keep them in one line */
header nav,
header .nav-links {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

/* Keep any auth buttons/links aligned on the right */
header .auth-links {
    display: flex;
    align-items: center;
    gap: 1rem;
}

/* Mobile tweak */
@media (max-width: 640px) {
    header {
        flex-wrap: wrap;
        gap: 0.5rem;
        padding-inline: 1.1rem;
        font-size: 1rem;
    }
}

/* Footer styling override */
footer {
    background-color: #ffffff;
    border-top: 1px solid #e5e7eb;
    padding: 2rem 1.25rem;
    text-align: center;
    font-size: 0.95rem;
    color: #6b7280;
}

footer a {
    color: #6b7280;
    text-decoration: none;
    margin: 0 0.6rem;
    font-weight: 500;
}

footer a:hover {
    color: #111827;
}

footer p,
footer div {
    margin: 0.3rem 0;
}
</style>

<div class="at-home">
    <!-- HERO -->
    <section class="at-home-hero">
        <div>
            <div class="at-home-eyebrow">
                <span>Online aviation coaching</span>
            </div>
            <h1>Aviator Tutor — learn from real aviation experts worldwide</h1>
            <p class="at-home-lead">
                Book 1-on-1 sessions with airline captains, cabin crew trainers, ATC instructors and engineers. 
                Prepare for sims, interviews, checks and exams from anywhere.
            </p>

            <div class="at-home-actions">
                <a href="{{ url('/tutors') }}" class="at-btn at-btn-primary">Find a tutor</a>
                <a href="{{ url('/become-tutor') }}" class="at-btn at-btn-outline">Become a tutor</a>
            </div>

            <div class="at-home-meta">
                <span><strong>For aviation only</strong> · pilots, cabin crew, ATC, engineers</span>
                <span><strong>Pay per lesson</strong> · no monthly contract</span>
            </div>
        </div>

        <aside class="at-hero-card">
            <div class="at-hero-card-header">
                <div class="at-hero-tutor">
                    <div class="at-avatar">LC</div>
                    <div>
                        <div style="font-weight: 600; font-size: 0.95rem;">Q400 / B737 Training Captain</div>
                        <div class="at-helptext">Type rating · sim checks · CRM</div>
                    </div>
                </div>
                <div>
                    <div style="font-weight: 600; font-size: 0.95rem;">USD 45 / hr</div>
                    <div class="at-helptext">Live on Zoom</div>
                </div>
            </div>

            <div class="at-chip-row">
                <span class="at-chip">Simulator prep</span>
                <span class="at-chip">Profiles & approaches</span>
                <span class="at-chip">Abnormals & failures</span>
            </div>

            <p class="at-helptext">
                “We rehearse your exact briefing, profiles and abnormal drills so your check feels like another practice flight.”
            </p>
        </aside>
    </section>

    <!-- HOW IT WORKS -->
    <section class="at-section">
        <div class="at-section-header">
            <div>
                <div class="at-section-title">How Aviator Tutor works</div>
                <p class="at-section-subtitle">
                    Simple, flexible and built for aviation people who live with rosters, standbys and irregular days off.
                </p>
            </div>
        </div>

        <div class="at-grid-3">
            <div class="at-card">
                <h3>1. Find your tutor</h3>
                <p>Filter by role, aircraft type, language and hourly rate. See real airline and training experience.</p>
            </div>
            <div class="at-card">
                <h3>2. Book a slot</h3>
                <p>Pick a time that fits your duty pattern. Get reminders and manage sessions in your dashboard.</p>
            </div>
            <div class="at-card">
                <h3>3. Train live online</h3>
                <p>Share charts, SOPs and scenarios via video, screen share and whiteboards — focused on your goals.</p>
            </div>
        </div>
    </section>

    <!-- WHO WE TRAIN -->
    <section class="at-section">
        <div class="at-section-header">
            <div>
                <div class="at-section-title">Built for the whole crew</div>
                <p class="at-section-subtitle">
                    Not a generic tutoring site. Aviator Tutor is focused only on aviation professionals and students.
                </p>
            </div>
        </div>

        <div class="at-grid-3">
            <div class="at-card">
                <h3>Pilots</h3>
                <p>Type ratings, sim checks, LOFT, line training support, ATPL refreshers and interview preparation.</p>
            </div>
            <div class="at-card">
                <h3>Cabin crew</h3>
                <p>Initial and recurrent exam prep, service and safety roleplays, grooming and interview practice.</p>
            </div>
            <div class="at-card">
                <h3>ATC & engineers</h3>
                <p>Phraseology, ICAO English, technical interviews, systems refresh and exam prep.</p>
            </div>
        </div>
    </section>

    <!-- FEATURED TUTORS (static for now, you can later replace with real data) -->
    <section class="at-section">
        <div class="at-section-header">
            <div>
                <div class="at-section-title">Featured tutors</div>
                <p class="at-section-subtitle">
                    A sample of the professionals you can book. You’ll be able to search and filter many more.
                </p>
            </div>
            <a href="{{ url('/tutors') }}" class="at-btn at-btn-outline">Browse all tutors</a>
        </div>

        <div class="at-grid-3">
            <div class="at-card">
                <h3>Airline Training Captain</h3>
                <p>Q400 / B737 · sim & line checks</p>
                <p class="at-helptext" style="margin-top:0.5rem;">
                    Checkride prep, abnormal drills, CRM/TEM and profiles, tailored to your airline’s SOPs.
                </p>
            </div>
            <div class="at-card">
                <h3>Cabin Crew Trainer</h3>
                <p>Service · safety · interviews</p>
                <p class="at-helptext" style="margin-top:0.5rem;">
                    Mock assessments, safety questions, service flows and grooming feedback before your next interview.
                </p>
            </div>
            <div class="at-card">
                <h3>ATPL Ground Instructor</h3>
                <p>Performance · systems · OPS</p>
                <p class="at-helptext" style="margin-top:0.5rem;">
                    Short, focused sessions to clear doubts and keep your theory fresh between flights.
                </p>
            </div>
        </div>
    </section>
</div>
@endsection
