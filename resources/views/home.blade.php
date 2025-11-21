@extends('layouts.app')

@section('content')
<div class="bg-slate-50">

    {{-- HERO --}}
    <section class="border-b border-slate-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 flex flex-col md:flex-row md:items-center md:space-x-10">
            <div class="flex-1 mb-8 md:mb-0">
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-semibold text-slate-900 mb-3">
                    Train with real aviation professionals, from anywhere.
                </h1>
                <p class="text-sm sm:text-base text-slate-600 mb-4">
                    Aviator Tutor connects pilots, cabin crew, ATC and engineers with experienced aviation instructors
                    for 1-on-1 coaching, exam prep and real-world scenario training.
                </p>
                <ul class="text-sm text-slate-600 space-y-1 mb-6">
                    <li class="flex items-start space-x-2">
                        <span class="mt-1 h-2 w-2 rounded-full bg-sky-500"></span>
                        <span>Live 1-on-1 lessons for checks, type ratings, interviews and CRM.</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="mt-1 h-2 w-2 rounded-full bg-sky-500"></span>
                        <span>Global time-zone support – always see availability in your local time.</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <span class="mt-1 h-2 w-2 rounded-full bg-sky-500"></span>
                        <span>Pay per lesson – no long contracts or complicated packages.</span>
                    </li>
                </ul>

                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-3 space-y-3 sm:space-y-0">
                    <a href="{{ route('tutors.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-full text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700 shadow-sm">
                        Find a tutor
                    </a>
                    <a href="{{ route('tutor.apply') }}" class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-semibold border border-sky-100 text-sky-700 bg-white hover:border-sky-200">
                        Become a tutor
                    </a>
                </div>

                <div class="mt-6 flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-slate-500">
                    <span>✅ Real airline & training captains</span>
                    <span>✅ Type-rated tutors (Q400, B737, A320, C208…)</span>
                    <span>✅ Video + whiteboard + file sharing</span>
                </div>
            </div>

            <div class="flex-1 flex justify-center">
                <div class="w-full max-w-md bg-white rounded-3xl shadow-sm border border-sky-50 p-4 sm:p-5">
                    <div class="flex items-center mb-4">
                        <div class="h-12 w-12 rounded-full bg-sky-100 flex items-center justify-center text-sky-700 font-semibold text-sm mr-3">
                            Q4
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">Q400 Recurrent Check</p>
                            <p class="text-xs text-slate-500">With an airline training captain – 60 min session</p>
                        </div>
                    </div>
                    <div class="space-y-3 text-xs text-slate-600 mb-4">
                        <div class="flex justify-between">
                            <span>Profiles reviewed</span>
                            <span class="font-medium text-slate-900">3,245+ crew trained</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Average rating</span>
                            <span class="font-medium text-slate-900">4.9 ★</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Starting from</span>
                            <span class="font-semibold text-sky-700">USD 30 / hour</span>
                        </div>
                    </div>
                    <button class="w-full inline-flex items-center justify-center px-4 py-2.5 rounded-full text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700 shadow-sm">
                        Book a trial lesson
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURED TUTORS PREVIEW --}}
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg sm:text-xl font-semibold text-slate-900">
                Featured aviation tutors
            </h2>
            <a href="{{ route('tutors.index') }}" class="text-xs sm:text-sm font-medium text-sky-700 hover:text-sky-800">
                Browse all tutors →
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            {{-- Static sample cards for now; later we can loop real tutors --}}
            @foreach ([
                ['name' => 'Q400 Line Captain', 'role' => 'Airline Pilot · Check Airman', 'tags' => 'Q400 · SOP · Recurrent', 'price' => 'USD 45 / hr'],
                ['name' => 'Cabin Crew Instructor', 'role' => 'Senior CC · Trainer', 'tags' => 'Grooming · Service · Safety', 'price' => 'USD 25 / hr'],
                ['name' => 'ATPL Ground Instructor', 'role' => 'Theoretical Knowledge', 'tags' => 'ATPL · Performance · Systems', 'price' => 'USD 30 / hr'],
            ] as $tutor)
                <div class="bg-white rounded-3xl shadow-sm border border-slate-100 p-4 flex flex-col">
                    <div class="flex items-center mb-3">
                        <div class="h-10 w-10 rounded-full bg-sky-100 flex items-center justify-center text-sky-700 text-xs font-semibold mr-3">
                            {{ strtoupper(substr($tutor['name'], 0, 2)) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $tutor['name'] }}</p>
                            <p class="text-xs text-slate-500">{{ $tutor['role'] }}</p>
                        </div>
                    </div>
                    <p class="text-xs text-slate-600 mb-3">
                        {{ $tutor['tags'] }}
                    </p>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="text-xs font-semibold text-sky-700">{{ $tutor['price'] }}</span>
                        <a href="{{ route('tutors.index') }}" class="text-xs font-medium text-sky-700 hover:text-sky-800">
                            View profile
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- WHAT AVIATOR TUTOR OFFERS --}}
    <section class="bg-white border-y border-slate-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
            <h2 class="text-lg sm:text-xl font-semibold text-slate-900 mb-6 text-center">
                See what Aviator Tutor offers
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-slate-50 rounded-3xl px-5 py-6">
                    <h3 class="text-base font-semibold text-slate-900 mb-1">1-on-1 coaching</h3>
                    <p class="text-sm text-slate-600 mb-3">
                        Book private sessions with airline pilots, instructors, cabin crew and ATC
                        to work on checks, interviews, type ratings or language.
                    </p>
                    <a href="{{ route('tutors.index') }}" class="text-xs font-medium text-sky-700 hover:text-sky-800">
                        Find my tutor →
                    </a>
                </div>
                <div class="bg-slate-50 rounded-3xl px-5 py-6">
                    <h3 class="text-base font-semibold text-slate-900 mb-1">Group classes</h3>
                    <p class="text-sm text-slate-600 mb-3">
                        Join focused group sessions on CRM, SOP, exam revision and airline assessments.
                        Perfect for crew preparing together.
                    </p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-700">
                        Coming soon
                    </span>
                </div>
                <div class="bg-slate-50 rounded-3xl px-5 py-6">
                    <h3 class="text-base font-semibold text-slate-900 mb-1">Practice for free</h3>
                    <p class="text-sm text-slate-600 mb-3">
                        Access resources, scenarios and community discussions to keep your aviation
                        knowledge sharp between flights.
                    </p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700">
                        In planning
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS PREVIEW --}}
    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
        <h2 class="text-lg sm:text-xl font-semibold text-slate-900 mb-6 text-center">
            Hear it from aviation learners
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">
            @foreach ([
                ['title' => 'Helped me pass my Q400 check', 'body' => 'We went through profiles, scenarios and failures exactly like the airline sim.'],
                ['title' => 'Great for CC interview prep', 'body' => 'My tutor corrected my answers and body language before my assessment day.'],
                ['title' => 'Structured ATPL ground review', 'body' => 'Short, focused sessions on performance and systems that fit my roster.'],
            ] as $review)
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm px-5 py-4 text-sm">
                    <div class="flex items-center mb-2">
                        <div class="flex text-amber-400 text-xs mr-2">
                            ★★★★★
                        </div>
                        <span class="text-[11px] text-slate-500">Verified learner</span>
                    </div>
                    <p class="font-semibold text-slate-900 mb-1">{{ $review['title'] }}</p>
                    <p class="text-xs text-slate-600">{{ $review['body'] }}</p>
                </div>
            @endforeach
        </div>
        <p class="text-[11px] text-center text-slate-500">
            Aviator Tutor is built by active airline crew and instructors, with a focus on real operations.
        </p>
    </section>

    {{-- FAQ PREVIEW --}}
    <section class="bg-white border-t border-slate-100">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
            <h2 class="text-lg sm:text-xl font-semibold text-slate-900 mb-4 text-center">
                Frequently asked questions
            </h2>
            <div class="space-y-3">
                <details class="bg-slate-50 rounded-2xl px-4 py-3">
                    <summary class="text-sm font-medium text-slate-900 cursor-pointer">
                        How does Aviator Tutor work?
                    </summary>
                    <p class="mt-2 text-xs text-slate-600">
                        Create a free account, browse aviation tutors, check their experience and availability
                        in your local time, then book and pay for a lesson. You’ll receive a meeting link and
                        any pre-lesson briefing from your tutor.
                    </p>
                </details>
                <details class="bg-slate-50 rounded-2xl px-4 py-3">
                    <summary class="text-sm font-medium text-slate-900 cursor-pointer">
                        What tools do you use for lessons?
                    </summary>
                    <p class="mt-2 text-xs text-slate-600">
                        We integrate with popular video tools (Zoom or similar) plus screen sharing and documents,
                        so tutors can use profiles, Jepp charts, performance tables and CBT-style materials.
                    </p>
                </details>
                <details class="bg-slate-50 rounded-2xl px-4 py-3">
                    <summary class="text-sm font-medium text-slate-900 cursor-pointer">
                        Can I become a tutor?
                    </summary>
                    <p class="mt-2 text-xs text-slate-600">
                        Yes. If you are an active or former aviation professional, you can submit an application
                        with your licenses and experience details. After approval, you’ll be able to set your rate,
                        availability and lesson types.
                    </p>
                </details>
            </div>
        </div>
    </section>

</div>
@endsection
