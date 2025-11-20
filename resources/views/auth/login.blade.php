@extends('layouts.app')

@section('content')
<div style="max-width:1040px;margin:0 auto;padding:40px clamp(16px,6vw,72px) 80px;">
    <section style="background:linear-gradient(135deg,#e2f3ff,#f3f6fb);border-radius:32px;padding:36px;border:1px solid #e0ecff;box-shadow:0 25px 60px rgba(15,23,42,0.08);margin-bottom:28px;">
        <p style="text-transform:uppercase;font-size:12px;font-weight:600;color:#0284c7;letter-spacing:0.08em;margin:0;">Sign in</p>
        <h1 style="font-size:clamp(2rem,4vw,2.7rem);margin:6px 0;">Welcome back to Aviator Tutor</h1>
        <p style="color:#64748b;max-width:640px;">Log in to manage your lessons, chat with aviation mentors, and continue your training plan.</p>
    </section>

    @if(session('status'))
        <div style="margin-bottom:18px;padding:14px;border-radius:18px;border:1px solid rgba(16,185,129,0.3);background:rgba(16,185,129,0.12);color:#047857;font-size:0.92rem;">
            {{ session('status') }}
        </div>
    @endif

    <section style="background:#fff;border-radius:32px;border:1px solid #e5e7eb;padding:32px 28px;box-shadow:0 20px 45px rgba(15,23,42,0.08);">
        <form method="POST" action="{{ route('login.store') }}" style="display:grid;gap:22px;">
            @csrf

            <div>
                <label style="font-weight:600;font-size:0.9rem;color:#0f172a;">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    placeholder="you@example.com"
                    style="width:100%;border-radius:16px;border:1px solid #e2e8f0;padding:0.85rem 1rem;font-size:1rem;"
                >
                @error('email')
                    <p style="margin-top:6px;font-size:0.82rem;color:#dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label style="font-weight:600;font-size:0.9rem;color:#0f172a;">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    placeholder="Your password"
                    style="width:100%;border-radius:16px;border:1px solid #e2e8f0;padding:0.85rem 1rem;font-size:1rem;"
                >
                @error('password')
                    <p style="margin-top:6px;font-size:0.82rem;color:#dc2626;">{{ $message }}</p>
                @enderror
            </div>

            <div style="display:flex;justify-content:flex-end;">
                <button type="submit" style="border:none;border-radius:999px;padding:0.9rem 1.5rem;font-size:0.95rem;font-weight:600;background:linear-gradient(120deg,#2563eb,#3b82f6);color:#fff;box-shadow:0 15px 30px rgba(37,99,235,0.25);cursor:pointer;">
                    Sign in
                </button>
            </div>
        </form>
        <p style="margin-top:18px;font-size:0.9rem;text-align:center;color:#6b7280;">
            Don’t have an account?
            <a href="{{ route('register') }}" style="color:#2563eb;font-weight:600;text-decoration:none;">Join for free</a>
        </p>
    </section>
</div>
@endsection
