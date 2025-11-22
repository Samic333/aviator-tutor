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
</style>
    </head>
    <body class="font-sans antialiased at-page text-[var(--at-text-main)] flex flex-col">
        @include('layouts.navbar')

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
                    <a href="{{ route('about') }}">About</a>
                    <a href="{{ route('faq') }}">FAQ</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </div>
                <div class="at-footer-copy">
                    Â© {{ date('Y') }} Aviator Tutor. Built by aviation professionals.
                </div>
            </div>
        </footer>
    </body>
</html>


