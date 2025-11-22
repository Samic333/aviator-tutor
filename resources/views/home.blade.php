@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen">
    {{-- HERO --}}
    <section class="bg-gradient-to-b from-sky-50 via-white to-slate-50 border-b border-slate-100">
        <div class="app-container py-12 lg:py-16 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12 items-center">
            <div class="space-y-5">
                <p class="inline-flex items-center text-[11px] font-semibold text-sky-700 bg-sky-50 px-3 py-1 rounded-full">
                    <span class="h-2 w-2 rounded-full bg-emerald-500 mr-2"></span>
                    Live aviation coaching • pilots • cabin crew • ATC • engineers
                </p>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-slate-900 leading-tight">
                    Train with real aviation professionals, anywhere in the world and fly like a pro.
                </h1>
                <p class="text-sm sm:text-base text-slate-600 max-w-2xl">
                    Aviator Tutor connects you with verified airline instructors for checkrides, type ratings, interviews,
                    SOP refreshers, and realistic scenario training—scheduled in your local time.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('tutors.index') }}" class="btn-primary">
                        Find a tutor
                    </a>
                    <a href="{{ route('tutor.apply') }}" class="btn-secondary">
                        Become a tutor
                    </a>
                </div>
                <div class="flex flex-wrap gap-4 text-xs sm:text-[13px] text-slate-600">
                    <span class="flex items-center space-x-2"><span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span><span>4.9★ average rating</span></span>
                    <span class="flex items-center space-x-2"><span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span><span>150+ aviation tutors worldwide</span></span>
                    <span class="flex items-center space-x-2"><span class="h-1.5 w-1.5 rounded-full bg-sky-500"></span><span>24/7 availability in your time zone</span></span>
                </div>
            </div>

            <div class="w-full max-w-lg mx-auto card space-y-4">
                <div class="flex items-center">
                    <div class="h-12 w-12 rounded-full bg-sky-100 flex items-center justify-center text-sky-700 font-semibold text-sm mr-3">
                        AT
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-900">Airline Training Captain · Q400/B737</p>
                        <p class="text-[11px] text-slate-500">Recurrent checks · Abnormals · CRM/TEM</p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-3 text-[11px] text-slate-600">
                    <div class="bg-slate-50 rounded-2xl px-3 py-2">
                        <p class="font-semibold text-slate-900 mb-1">Teaches</p>
                        <p>Profiles & approaches<br>Engine failures<br>LOFT scenarios</p>
                    </div>
                    <div class="bg-slate-50 rounded-2xl px-3 py-2">
                        <p class="font-semibold text-slate-900 mb-1">Best for</p>
                        <p>Sim & line checks<br>Type-rating prep<br>Interview drills</p>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs">
                    <div class="flex items-center space-x-1">
                        <span class="text-amber-400">★★★★★</span>
                        <span class="text-slate-500">4.9 · 320 lessons</span>
                    </div>
                    <span class="font-semibold text-sky-700">USD 45 / hr</span>
                </div>
                <button class="w-full btn-primary">
                    Book trial lesson
                </button>
            </div>
        </div>
    </section>

    {{-- CATEGORIES --}}
    <section id="browse" class="section">
        <div class="section-header">
            <h2 class="text-lg sm:text-xl font-semibold text-slate-900">Choose your path</h2>
            <a href="{{ route('tutors.index') }}" class="text-xs sm:text-sm font-medium text-sky-700 hover:text-sky-800">Browse tutors →</a>
        </div>
        <p class="text-sm text-slate-600 mb-6">Reach the right instructor—whether you fly the line, brief in the cabin, work the tower, or maintain the fleet.</p>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach ([
                ['title' => 'Pilots', 'desc' => 'Type ratings, sim checks, airline interviews.'],
                ['title' => 'Cabin Crew', 'desc' => 'Grooming, service, safety, interviews.'],
                ['title' => 'ATC', 'desc' => 'Phraseology, sims, assessments.'],
                ['title' => 'Engineers', 'desc' => 'Systems, exams, troubleshooting.'],
            ] as $cat)
                <a href="{{ route('tutors.index') }}" class="group card flex flex-col justify-between">
                    <div>
                        <p class="text-sm font-semibold text-slate-900 mb-1">{{ $cat['title'] }}</p>
                        <p class="text-xs text-slate-600">{{ $cat['desc'] }}</p>
                    </div>
                    <span class="mt-3 text-[11px] font-semibold text-sky-700 group-hover:text-sky-800">Explore {{ strtolower($cat['title']) }} tutors →</span>
                </a>
            @endforeach
        </div>
    </section>

    {{-- FEATURED TUTORS --}}
    <section class="bg-white border-y border-slate-100">
        <div class="section">
            <div class="section-header">
                <h2 class="text-lg sm:text-xl font-semibold text-slate-900">Featured tutors</h2>
                <a href="{{ route('tutors.index') }}" class="text-xs sm:text-sm font-medium text-sky-700 hover:text-sky-800">See all →</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach ([
                    ['initials'=>'AB','name'=>'Airline Training Captain','role'=>'Q400 · B737 · Line checks','desc'=>'Checkrides, profiles, abnormals, CRM/TEM','price'=>'USD 45 / hr'],
                    ['initials'=>'CC','name'=>'Senior Cabin Crew Trainer','role'=>'Service · Safety · Interviews','desc'=>'Mock interviews, service sims, safety drills','price'=>'USD 25 / hr'],
                    ['initials'=>'GI','name'=>'ATPL Ground Instructor','role'=>'Performance · Systems · OPS','desc'=>'Short, focused ATPL theory refreshers','price'=>'USD 30 / hr'],
                ] as $tutor)
                    <div class="card flex flex-col bg-slate-50">
                        <div class="flex items-center mb-3">
                            <div class="h-10 w-10 rounded-full bg-sky-100 flex items-center justify-center text-sky-700 text-xs font-semibold mr-3">{{ $tutor['initials'] }}</div>
                            <div>
                                <p class="text-sm font-semibold text-slate-900">{{ $tutor['name'] }}</p>
                                <p class="text-[11px] text-slate-500">{{ $tutor['role'] }}</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-600 mb-3">{{ $tutor['desc'] }}</p>
                        <div class="mt-auto flex items-center justify-between text-xs">
                            <span class="font-semibold text-sky-700">{{ $tutor['price'] }}</span>
                            <a href="{{ route('tutors.index') }}" class="font-medium text-sky-700 hover:text-sky-800">View profiles</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- WHAT AVIATOR TUTOR OFFERS --}}
    <section id="specialties" class="section">
        <h2 class="text-lg sm:text-xl font-semibold text-slate-900 mb-6 text-center">See what Aviator Tutor offers</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card bg-slate-50">
                <h3 class="text-base font-semibold text-slate-900 mb-1">1-on-1 coaching</h3>
                <p class="text-sm text-slate-600 mb-3">
                    Book private sessions with airline pilots, instructors, cabin crew and ATC to work on checks, interviews, type ratings or language.
                </p>
                <a href="{{ route('tutors.index') }}" class="text-xs font-medium text-sky-700 hover:text-sky-800">Find my tutor →</a>
            </div>
            <div class="card bg-slate-50">
                <h3 class="text-base font-semibold text-slate-900 mb-1">Group classes</h3>
                <p class="text-sm text-slate-600 mb-3">
                    Join focused group sessions on CRM, SOP, exam revision and airline assessments. Perfect for crew preparing together.
                </p>
                <span class="badge bg-amber-50 text-amber-700">Coming soon</span>
            </div>
            <div class="card bg-slate-50">
                <h3 class="text-base font-semibold text-slate-900 mb-1">Practice for free</h3>
                <p class="text-sm text-slate-600 mb-3">
                    Access resources, scenarios and community discussions to keep your aviation knowledge sharp between flights.
                </p>
                <span class="badge bg-emerald-50 text-emerald-700">In planning</span>
            </div>
        </div>
    </section>

    {{-- HOW IT WORKS --}}
    <section id="how-it-works" class="section">
        <h2 class="text-lg sm:text-xl font-semibold text-slate-900 mb-6 text-center">How Aviator Tutor works</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach ([
                ['step'=>'1','title'=>'Browse aviation tutors','body'=>'Filter by aircraft type, role, language and price. Review ratings and experience.'],
                ['step'=>'2','title'=>'Check availability & book','body'=>'See calendars in your local time zone, pick a slot, pay securely.'],
                ['step'=>'3','title'=>'Meet online & train','body'=>'Share charts, documents and scenarios live with your tutor.'],
            ] as $item)
                <div class="card">
                    <div class="h-8 w-8 rounded-full bg-sky-100 flex items-center justify-center text-xs font-semibold text-sky-700 mb-3">{{ $item['step'] }}</div>
                    <h3 class="text-base font-semibold text-slate-900 mb-1">{{ $item['title'] }}</h3>
                    <p class="text-sm text-slate-600">{{ $item['body'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- TESTIMONIALS + FAQ --}}
    <section class="bg-white border-t border-slate-100">
        <div class="app-container py-10 sm:py-12 grid grid-cols-1 lg:grid-cols-2 gap-10">
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-slate-900 mb-4">Hear it from aviation learners</h2>
                <div class="space-y-3">
                    @foreach ([
                        ['name'=>'First Officer, Q400','text'=>'The captain walked me through our exact profiles and failures. My recurrent check felt like another lesson.'],
                        ['name'=>'Cabin crew applicant','text'=>'Mock interviews, grooming checks, and service drills made me feel ready for assessment.'],
                        ['name'=>'ATPL student','text'=>'Short, focused sessions after duty helped me clear performance and systems.'],
                    ] as $review)
                        <div class="card bg-slate-50">
                            <div class="flex items-center mb-1 text-[11px]">
                                <span class="text-amber-400 mr-1">★★★★★</span>
                                <span class="text-slate-500">Verified learner</span>
                            </div>
                            <p class="text-slate-700 mb-1 text-sm">{{ $review['text'] }}</p>
                            <p class="text-[11px] text-slate-500">{{ $review['name'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h2 class="text-lg sm:text-xl font-semibold text-slate-900 mb-4">Frequently asked questions</h2>
                <div class="space-y-3">
                    <details class="card bg-slate-50">
                        <summary class="text-sm font-medium text-slate-900 cursor-pointer">Do I need special software for lessons?</summary>
                        <p class="mt-2 text-xs text-slate-600">No. Use any modern device with camera/mic. We rely on browser-friendly video plus screen sharing.</p>
                    </details>
                    <details class="card bg-slate-50">
                        <summary class="text-sm font-medium text-slate-900 cursor-pointer">Can I reschedule or cancel?</summary>
                        <p class="mt-2 text-xs text-slate-600">Tutors set their own policies, but most allow rescheduling within a cutoff. You will see the rules before booking.</p>
                    </details>
                    <details class="card bg-slate-50">
                        <summary class="text-sm font-medium text-slate-900 cursor-pointer">How do I become a tutor?</summary>
                        <p class="mt-2 text-xs text-slate-600">Submit your aviation credentials via the Teach link. After approval, set your rate, schedule, and lesson types.</p>
                    </details>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
