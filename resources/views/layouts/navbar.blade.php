<style>
/* Global navbar styles for Aviator Tutor */
.at-header {
    position: sticky;
    top: 0;
    z-index: 50;
    width: 100%;
    background-color: #ffffff;
    border-bottom: 1px solid #e5e7eb;
}

.at-header-inner {
    max-width: 1120px;
    margin: 0 auto;
    padding: 0.85rem 1.75rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text", sans-serif;
}

.at-logo {
    display: flex;
    align-items: center;
    gap: 0.7rem;
    text-decoration: none;
}

.at-logo-badge {
    width: 34px;
    height: 34px;
    border-radius: 999px;
    background: linear-gradient(135deg, #2563eb, #38bdf8);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-weight: 700;
    font-size: 0.95rem;
}

.at-logo-text {
    display: flex;
    flex-direction: column;
    line-height: 1.1;
}

.at-logo-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #0f172a;
}

.at-logo-subtitle {
    font-size: 0.8rem;
    color: #6b7280;
}

.at-nav-main {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1.75rem;
    font-size: 1.05rem;
    flex: 1;
}

.at-nav-main a {
    color: #4b5563;
    font-weight: 500;
    text-decoration: none;
}

.at-nav-main a:hover {
    color: #111827;
}

.at-nav-auth {
    display: flex;
    align-items: center;
    gap: 0.9rem;
    font-size: 1.05rem;
}

.at-nav-link {
    color: #4b5563;
    text-decoration: none;
    font-weight: 500;
}

.at-nav-link:hover {
    color: #111827;
}

.at-btn-pill {
    border-radius: 999px;
    border: 1px solid transparent;
    padding: 0.45rem 1.1rem;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.at-btn-pill-primary {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #ffffff;
    box-shadow: 0 18px 45px rgba(37, 99, 235, 0.35);
}

.at-btn-pill-primary:hover {
    box-shadow: 0 22px 60px rgba(37, 99, 235, 0.5);
    transform: translateY(-1px);
}

/* Simple responsive behaviour */
@media (max-width: 900px) {
    .at-header-inner {
        padding-inline: 1.2rem;
        gap: 1rem;
    }
    .at-nav-main {
        display: none; /* we can add a mobile menu later */
    }
    .at-logo-title {
        font-size: 1.05rem;
    }
}
</style>

<header class="at-header">
    <div class="at-header-inner">
        <a href="{{ url('/') }}" class="at-logo">
            <div class="at-logo-badge">AT</div>
            <div class="at-logo-text">
                <span class="at-logo-title">Aviator Tutor</span>
                <span class="at-logo-subtitle">Online aviation coaching</span>
            </div>
        </a>

        <nav class="at-nav-main">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/tutors') }}">Browse Tutors</a>
            <a href="{{ url('/#specialties') }}">Specialties</a>
            <a href="{{ url('/#how-it-works') }}">How it works</a>
            <a href="{{ url('/tutor/apply') }}">Teach</a>
        </nav>

        <div class="at-nav-auth">
            @guest
                <a href="{{ route('login') }}" class="at-nav-link">Sign in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="at-btn-pill at-btn-pill-primary">Join for free</a>
                @endif
            @else
                <a href="{{ url('/dashboard') }}" class="at-btn-pill at-btn-pill-primary">Dashboard</a>
            @endguest
        </div>
    </div>
</header>
