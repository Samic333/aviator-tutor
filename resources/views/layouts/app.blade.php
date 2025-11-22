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
    z-index: 50;
    background-color: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(148, 163, 184, 0.2);
}

.at-nav-inner,
.at-footer-inner,
.at-main-inner {
    max-width: 1120px;
    margin: 0 auto;
    padding: 0 1.25rem;
}

.at-nav-inner {
    display: flex;
    align-items: center;
    justify-between: space-between;
    height: 64px;
}

.at-brand {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 700;
    letter-spacing: 0.04em;
}

.at-brand-badge {
    width: 32px;
    height: 32px;
    border-radius: 999px;
    background: linear-gradient(135deg, var(--at-primary), #38bdf8);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 0.95rem;
    font-weight: 700;
}

.at-nav-links {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    font-size: 0.95rem;
}

.at-nav-links a {
    color: var(--at-text-muted);
    font-weight: 500;
}

.at-nav-links a:hover {
    color: var(--at-text-main);
}

.at-nav-actions {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.95rem;
}

.at-btn {
    border-radius: 999px;
    border: 1px solid transparent;
    padding: 0.45rem 1rem;
    font-size: 0.95rem;
    font-weight: 500;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.35rem;
    transition: all 0.18s ease-out;
}

.at-btn-primary {
    background: linear-gradient(135deg, var(--at-primary), #1d4ed8);
    color: #ffffff;
    box-shadow: 0 18px 45px rgba(37, 99, 235, 0.4);
}

.at-btn-primary:hover {
    transform: translateY(-1px);
    box-shadow: 0 22px 60px rgba(37, 99, 235, 0.55);
}

.at-btn-ghost {
    background-color: transparent;
    border-color: rgba(148, 163, 184, 0.6);
    color: var(--at-text-main);
}

.at-btn-ghost:hover {
    background-color: rgba(148, 163, 184, 0.06);
}

.at-main {
    flex: 1;
    padding: 1.5rem 0 3rem;
}

.at-main-inner {
    width: 100%;
}

.at-footer {
    border-top: 1px solid rgba(148, 163, 184, 0.3);
    background-color: #ffffff;
    padding: 1.75rem 0;
    margin-top: auto;
    font-size: 0.85rem;
}

.at-footer-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.5rem;
    flex-wrap: wrap;
    color: var(--at-text-muted);
}

.at-footer-links {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.at-footer-links a {
    color: var(--at-text-muted);
}

.at-footer-links a:hover {
    color: var(--at-text-main);
}

@media (max-width: 900px) {
    .at-nav-inner {
        padding-inline: 1rem;
    }
}

@media (max-width: 640px) {
    .at-nav-links {
        display: none;
    }
    .at-main {
        padding-top: 1rem;
    }
}
</style>
    </head>
    <body class="font-sans antialiased at-page text-[var(--at-text-main)] flex flex-col">
        @include('partials.nav')

        <!-- Page Content -->
        <main class="at-main">
            <div class="at-main-inner">
                @yield('content')
            </div>
        </main>

        @includeWhen(View::exists('partials.footer'), 'partials.footer')
    </body>
</html>
