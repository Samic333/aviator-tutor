<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Aviator Tutor') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
:root {
    --at-primary: #2563eb;   /* sky/aviation blue */
    --at-primary-soft: #e0edff;
    --at-bg: #f3f6fd;
    --at-surface: #ffffff;
    --at-text-main: #0f172a;
    --at-text-muted: #6b7280;
    --at-border-soft: #e5e7eb;
    --at-radius-lg: 1.25rem;
    --at-radius-md: 0.75rem;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

html, body {
    margin: 0;
    padding: 0;
}

body {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "SF Pro Text", sans-serif;
    color: #0f172a;
    background: radial-gradient(circle at top left, #e0edff 0, #f9fafb 55%, #ffffff 100%);
    min-height: 100vh;
}

a {
    text-decoration: none;
    color: inherit;
}

.at-page {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.at-nav {
    position: sticky;
    top: 0;
    z-index: 40;
    background-color: #ffffff;
    border-bottom: 1px solid #e5e7eb;
}

.at-nav-inner {
    max-width: 1120px;
    margin: 0 auto;
    padding: 0.75rem 1.75rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
}

.at-brand {
    display: flex;
    align-items: center;
    gap: 0.6rem;
    text-decoration: none;
}

.at-brand-badge {
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

.at-brand-text {
    display: flex;
    flex-direction: column;
    line-height: 1.1;
}

.at-brand-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #0f172a;
}

.at-brand-subtitle {
    font-size: 0.8rem;
    color: #6b7280;
}

.at-nav-menu {
    display: flex;
    align-items: center;
    gap: 1.75rem;
    font-size: 1.02rem;
}

.at-nav-menu a {
    color: #4b5563;
    font-weight: 500;
    text-decoration: none;
}

.at-nav-menu a:hover {
    color: #111827;
}

.at-nav-auth {
    display: flex;
    align-items: center;
    gap: 0.9rem;
    font-size: 1.02rem;
}

.at-nav-link {
    color: #4b5563;
    text-decoration: none;
    font-weight: 500;
}

.at-nav-link:hover {
    color: #111827;
}

.at-btn {
    border-radius: 999px;
    border: 1px solid transparent;
    padding: 0.45rem 1.1rem;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.3rem;
    text-decoration: none;
}

.at-btn-primary {
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #ffffff;
    box-shadow: 0 18px 45px rgba(37, 99, 235, 0.35);
}

.at-btn-primary:hover {
    box-shadow: 0 22px 60px rgba(37, 99, 235, 0.5);
    transform: translateY(-1px);
}

.at-btn-outline {
    background-color: transparent;
    border-color: #cbd5f5;
    color: #1e293b;
}

.at-btn-outline:hover {
    background-color: #eef2ff;
}

.at-main {
    flex: 1;
    padding: 1.5rem 0 3rem;
}

.at-main-inner {
    max-width: 1120px;
    margin: 0 auto;
    padding: 0 1.25rem;
    width: 100%;
}

.at-footer {
    background-color: #ffffff;
    border-top: 1px solid #e5e7eb;
    padding: 2rem 0;
    margin-top: 2rem;
}

.at-footer-inner {
    max-width: 1120px;
    margin: 0 auto;
    padding: 0 1.5rem;
    text-align: center;
    font-size: 0.95rem;
    color: #6b7280;
}

.at-footer-brand {
    margin-bottom: 0.75rem;
}

.at-footer-links {
    display: flex;
    gap: 1.2rem;
    flex-wrap: wrap;
    justify-content: center;
    margin-bottom: 0.75rem;
}

.at-footer-links a {
    color: #6b7280;
    text-decoration: none;
    font-weight: 500;
}

.at-footer-links a:hover {
    color: #111827;
}

.at-footer-copy {
    font-size: 0.85rem;
    color: #9ca3af;
}

/* Simple responsive tweak: hide full menu on very small screens for now */
@media (max-width: 768px) {
    .at-nav-inner {
        padding-inline: 1.2rem;
        gap: 1rem;
    }
    .at-nav-menu {
        display: none;
    }
    .at-nav-auth {
        font-size: 0.95rem;
    }
}
</style>
    </head>
    <body class="font-sans antialiased at-page text-[var(--at-text-main)] flex flex-col">
        <header class="at-nav">
            <div class="at-nav-inner">
                <a href="{{ url('/') }}" class="at-brand">
                    <span class="at-brand-badge">AT</span>
                    <span class="at-brand-text">
                        <span class="at-brand-title">Aviator Tutor</span>
                        <span class="at-brand-subtitle">Train with aviation pros</span>
                    </span>
                </a>

                <nav class="at-nav-menu">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/tutors') }}">Browse Tutors</a>
                    <a href="{{ url('/specialties') }}">Specialties</a>
                    <a href="{{ url('/how-it-works') }}">How it works</a>
                    <a href="{{ url('/teach') }}">Teach</a>
                </nav>

                <div class="at-nav-auth">
                    @guest
                        <a href="{{ route('login') }}" class="at-nav-link">Sign in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="at-btn at-btn-primary">Join for free</a>
                        @endif
                    @else
                        <a href="{{ url('/dashboard') }}" class="at-btn at-btn-outline">Dashboard</a>
                    @endguest
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="at-main">
            <div class="at-main-inner">
                @yield('content')
            </div>
        </main>

        <footer class="at-footer">
            <div class="at-footer-inner">
                <div class="at-footer-brand">
                    <strong>AT</strong> Aviator Tutor — Train with aviation pros
                </div>
                <div class="at-footer-links">
                    <a href="{{ url('/tutors') }}">Browse Tutors</a>
                    <a href="{{ url('/specialties') }}">Specialties</a>
                    <a href="{{ url('/about') }}">About</a>
                    <a href="{{ url('/faq') }}">FAQ</a>
                    <a href="{{ url('/contact') }}">Contact</a>
                </div>
                <div class="at-footer-copy">
                    © {{ date('Y') }} Aviator Tutor. Built by aviation professionals.
                </div>
            </div>
        </footer>
    </body>
</html>
