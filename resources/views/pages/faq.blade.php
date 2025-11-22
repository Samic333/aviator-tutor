@extends('layouts.app')

@section('content')
<div class="at-home" style="max-width: 900px; margin: 0 auto; padding: 2.5rem 1.5rem 3rem;">
    <section class="at-section">
        <h1 style="font-size: 2rem; margin-bottom: 0.75rem;">Frequently Asked Questions</h1>
        <p style="color:#6b7280; margin-bottom: 1.5rem;">
            A few quick answers. You can always contact us if you need more details.
        </p>

        <div class="at-card" style="margin-bottom:1rem;">
            <h3>How do lessons work?</h3>
            <p>
                You book a time with a tutor, join the session online (Zoom or similar), and focus on your specific goal 
                – sim prep, interview practice, SOP review, English, etc.
            </p>
        </div>

        <div class="at-card" style="margin-bottom:1rem;">
            <h3>How do I pay?</h3>
            <p>
                You pay per lesson. In the next phase we will integrate a secure payment system so you can pay online before your session.
            </p>
        </div>

        <div class="at-card">
            <h3>Who are the tutors?</h3>
            <p>
                Aviation professionals – such as airline captains, instructors, cabin crew trainers, ATC and engineers – 
                who apply and are approved to teach on the platform.
            </p>
        </div>
    </section>
</div>
@endsection
