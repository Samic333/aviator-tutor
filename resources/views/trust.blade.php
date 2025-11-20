@extends('layouts.app')

@section('content')
<style>
    .trust-page {
        margin: 0 auto;
        max-width: 900px;
        padding: 40px 6vw 80px;
        font-family: "Inter", system-ui, sans-serif;
        color: #0f172a;
        background: #f0f4ff;
    }
    .trust-page h1 {
        margin-bottom: 10px;
        font-size: clamp(2rem, 4vw, 3rem);
    }
    .trust-page p.lead {
        color: #64748b;
        margin-bottom: 30px;
    }
    .review-card {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 18px;
        box-shadow: 0 12px 28px rgba(15,23,42,0.05);
    }
    .review-card strong { display: block; margin-bottom: 6px; }
    .badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(34,197,94,0.1);
        color: #15803d;
        font-weight: 600;
        margin-bottom: 14px;
    }
</style>

<div class="trust-page">
    <h1>Trust &amp; reviews</h1>
    <p class="lead">Thousands of hours coached with cadets, line pilots, cabin crew, ATC, and engineers worldwide.</p>

    <div class="review-card">
        <div class="badge">4.9 / 5 average rating</div>
        <strong>Jake &mdash; Cadet pilot</strong>
        &ldquo;My instructor recreated the airline sim ride, including abnormal procedures. It felt like a rehearsal.&rdquo;
    </div>
    <div class="review-card">
        <strong>Emma &mdash; Cabin crew lead</strong>
        &ldquo;After maternity leave I needed to refresh safety demos and service flow. Sessions were precise and friendly.&rdquo;
    </div>
    <div class="review-card">
        <strong>Alex &mdash; Area controller</strong>
        &ldquo;ATC refreshers covered phraseology, strips, and complex scenarios. I passed the requalification easily.&rdquo;
    </div>
</div>
@endsection
