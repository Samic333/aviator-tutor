@extends('layouts.app')

@section('content')
<div style="max-width:1100px;margin:0 auto;padding:40px clamp(16px,6vw,72px) 80px;">
    <section style="background:linear-gradient(135deg,#eaf5ff,#f3f6fb);border-radius:32px;padding:36px;border:1px solid #e0ecff;box-shadow:0 25px 60px rgba(15,23,42,0.08);margin-bottom:28px;">
        <p style="text-transform:uppercase;font-size:12px;font-weight:600;color:#0284c7;letter-spacing:0.08em;margin:0;">Join for free</p>
        <h1 style="font-size:clamp(2rem,4vw,2.7rem);margin:6px 0;">Create your Aviator Tutor account</h1>
        <p style="color:#64748b;max-width:640px;">Book mentors for simulator prep, airline interviews, ATPL refreshers, or cabin crew training. It only takes a minute to get started.</p>
    </section>

    <section style="background:#fff;border-radius:32px;border:1px solid #e5e7eb;padding:38px;box-shadow:0 22px 60px rgba(15,23,42,0.08);">
        <form method="POST" action="{{ route('register.store') }}" style="display:grid;gap:18px;">
            @csrf

            <div>
                <label style="display:block;font-weight:600;margin-bottom:6px;color:#0f172a;">Full name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Jane Doe" required style="width:100%;border-radius:14px;border:1px solid #e5e7eb;padding:0.85rem 1rem;font-size:1rem;">
                @error('name')
                    <p style="color:#dc2626;font-size:0.85rem;margin-top:6px;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label style="display:block;font-weight:600;margin-bottom:6px;color:#0f172a;">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required style="width:100%;border-radius:14px;border:1px solid #e5e7eb;padding:0.85rem 1rem;font-size:1rem;">
                @error('email')
                    <p style="color:#dc2626;font-size:0.85rem;margin-top:6px;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label style="display:block;font-weight:600;margin-bottom:6px;color:#0f172a;">Password (min 8 characters)</label>
                <input id="password" type="password" name="password" required style="width:100%;border-radius:14px;border:1px solid #e5e7eb;padding:0.85rem 1rem;font-size:1rem;">
                @error('password')
                    <p style="color:#dc2626;font-size:0.85rem;margin-top:6px;">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label style="display:block;font-weight:600;margin-bottom:6px;color:#0f172a;">Confirm password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required style="width:100%;border-radius:14px;border:1px solid #e5e7eb;padding:0.85rem 1rem;font-size:1rem;">
            </div>

            <div>
                <label style="display:block;font-weight:600;margin-bottom:6px;color:#0f172a;">I am signing up as</label>
                @php $selectedRole = old('role', 'student'); @endphp
                <select id="role" name="role" required style="width:100%;border-radius:14px;border:1px solid #e5e7eb;padding:0.85rem 1rem;font-size:1rem;background:#fff;">
                    <option value="student" @selected($selectedRole === 'student')>Student</option>
                    <option value="tutor" @selected($selectedRole === 'tutor')>Tutor</option>
                </select>
                @error('role')
                    <p style="color:#dc2626;font-size:0.85rem;margin-top:6px;">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" style="border:none;border-radius:999px;padding:0.95rem 1rem;font-weight:700;font-size:1rem;background:linear-gradient(120deg,#2563eb,#3b82f6);color:#fff;cursor:pointer;box-shadow:0 18px 35px rgba(37,99,235,0.25);">
                Create account
            </button>
        </form>

        <div style="margin-top:18px;font-size:0.95rem;text-align:center;color:#6b7280;">
            Already have an account?
            <a href="{{ route('login') }}" style="color:#2563eb;font-weight:600;text-decoration:none;">Sign in</a>
        </div>
    </section>
</div>
@endsection
