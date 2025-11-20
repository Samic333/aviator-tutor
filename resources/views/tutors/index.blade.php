@extends('layouts.app')

@section('content')
<style>
    :root {
        --page-bg: #f3f5fb;
        --panel: #ffffff;
        --border: #e5e7eb;
        --text: #0f172a;
        --muted: #6b7280;
        --accent: #2563eb;
        --accent-soft: rgba(37, 99, 235, 0.1);
        --hero-start: #e0f2ff;
        --hero-end: #f3f5fb;
    }
    .tutor-shell * { box-sizing: border-box; }
    .tutor-shell main {
        max-width: 1140px;
        margin: 0 auto;
        padding: 30px clamp(16px, 5vw, 60px) 60px;
    }
    header.hero {
        background: linear-gradient(120deg, var(--hero-start), var(--hero-end));
        border-radius: 28px;
        padding: 36px;
        border: 1px solid var(--border);
        box-shadow: 0 20px 45px rgba(15,23,42,0.07);
        margin-bottom: 32px;
    }
    header.hero h1 {
        margin: 0 0 12px;
        font-size: clamp(2rem, 4vw, 3rem);
    }
    header.hero p {
        margin: 0 0 20px;
        color: var(--muted);
    }
    form.filters {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 16px;
    }
    form.filters input,
    form.filters select {
        width: 100%;
        padding: 0.75rem 0.95rem;
        border-radius: 14px;
        border: 1px solid var(--border);
        font-size: 1rem;
        color: var(--text);
        background: #fff;
        box-shadow: inset 0 1px 2px rgba(15,23,42,0.05);
    }
    form.filters button {
        padding: 0.65rem 1.2rem;
        border-radius: 12px;
        border: none;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(120deg, #2563eb, #3b82f6);
        box-shadow: 0 12px 22px rgba(37, 99, 235, 0.22);
        cursor: pointer;
    }
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 24px;
    }
    .card {
        background: var(--panel);
        border-radius: 24px;
        border: 1px solid var(--border);
        padding: 24px;
        display: flex;
        gap: 16px;
        box-shadow: 0 18px 35px rgba(15,23,42,0.08);
    }
    .card-avatar {
        width: 72px;
        height: 72px;
        border-radius: 18px;
        background: var(--accent-soft);
        color: var(--accent);
        font-weight: 700;
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .card-body { flex: 1; display: flex; flex-direction: column; }
    .role-pill {
        display: inline-flex;
        padding: 4px 12px;
        border-radius: 999px;
        font-size: 0.85rem;
        font-weight: 600;
        background: rgba(15,23,42,0.06);
        color: var(--muted);
        margin-bottom: 6px;
    }
    .subjects {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin: 10px 0;
    }
    .subjects span {
        padding: 4px 10px;
        border-radius: 999px;
        background: rgba(15,23,42,0.07);
        font-size: 0.8rem;
        color: var(--muted);
    }
    .rate {
        font-weight: 700;
        color: var(--accent);
    }
    .card-actions {
        margin-top: auto;
        display: flex;
        justify-content: flex-end;
    }
    .card-actions .btn {
        padding: 0.65rem 1.2rem;
        border-radius: 12px;
        border: none;
        text-decoration: none;
        font-weight: 600;
        color: #fff;
        background: linear-gradient(120deg, #2563eb, #3b82f6);
        box-shadow: 0 12px 22px rgba(37, 99, 235, 0.22);
    }
    .empty {
        text-align: center;
        padding: 40px;
        background: var(--panel);
        border-radius: 20px;
        border: 1px solid var(--border);
        color: var(--muted);
    }
</style>

<div class="tutor-shell">
    <main>
        <header class="hero">
            <h1>Find an aviation tutor</h1>
            <p>Filter by role, aircraft, or hourly rate. Every mentor is an active aviation professional.</p>
            <form class="filters" method="GET" action="{{ route('tutors.index') }}">
                <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Search name, aircraft, or keyword">
                @php $role = $filters['role'] ?? 'any'; @endphp
                <select name="role">
                    <option value="any" @selected($role === 'any')>Any role</option>
                    <option value="pilot" @selected($role === 'pilot')>Pilot</option>
                    <option value="cabin_crew" @selected($role === 'cabin_crew')>Cabin Crew</option>
                    <option value="atc" @selected($role === 'atc')>ATC</option>
                    <option value="engineer" @selected($role === 'engineer')>Engineer</option>
                </select>
                <input type="text" name="country" value="{{ $filters['country'] ?? '' }}" placeholder="Country">
                <input type="number" name="min_rate" value="{{ $filters['min_rate'] ?? '' }}" placeholder="Min rate">
                <input type="number" name="max_rate" value="{{ $filters['max_rate'] ?? '' }}" placeholder="Max rate">
                @php $sort = $filters['sort'] ?? 'rating'; @endphp
                <select name="sort">
                    <option value="rating" @selected($sort === 'rating')>Top rated</option>
                    <option value="price_low" @selected($sort === 'price_low')>Price: Low to High</option>
                    <option value="price_high" @selected($sort === 'price_high')>Price: High to Low</option>
                    <option value="newest" @selected($sort === 'newest')>Newest tutors</option>
                </select>
                <button type="submit">Apply filters</button>
            </form>
        </header>

        <div class="cards">
            @forelse ($tutors as $tutor)
                @php
                    $initials = collect(explode(' ', $tutor->name))
                        ->filter()
                        ->map(fn($part) => strtoupper(mb_substr($part, 0, 1)))
                        ->take(2)
                        ->implode('');
                @endphp
                <article class="card">
                    <div class="card-avatar">{{ $initials }}</div>
                    <div class="card-body">
                        <span class="role-pill">{{ ucfirst($tutor->role) }}</span>
                        <h3>{{ $tutor->name }}</h3>
                        <p>{{ $tutor->headline }}</p>
                        <div class="subjects">
                            @foreach (array_slice((array) $tutor->subjects, 0, 3) as $subject)
                                <span>{{ $subject }}</span>
                            @endforeach
                        </div>
                        <p class="rate">{{ $tutor->currency ?? 'USD' }} {{ number_format($tutor->hourly_rate, 2) }} / hr</p>
                        <div class="card-actions">
                            <a class="btn" href="{{ route('tutors.show', $tutor->id) }}">View profile</a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty">No tutors match your filters right now.</div>
            @endforelse
        </div>
    </main>
</div>
@endsection
