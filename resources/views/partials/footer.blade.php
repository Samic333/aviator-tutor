<footer class="at-footer">
    <div class="container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div>
            <div class="flex items-center space-x-2 mb-3">
                <div class="h-9 w-9 rounded-full bg-sky-500 flex items-center justify-center shadow-sm">
                    <span class="text-white text-sm font-bold leading-none">AT</span>
                </div>
                <div class="flex flex-col leading-tight">
                    <span class="font-semibold text-slate-900 text-sm sm:text-base">Aviator Tutor</span>
                    <span class="text-[11px] text-slate-500">Train with aviation pros</span>
                </div>
            </div>
            <p class="text-sm text-slate-600 max-w-xs">
                1:1 online coaching for pilots, cabin crew, ATC, and engineers. Built by active aviation professionals.
            </p>
        </div>

        <div>
            <p class="app-footer-title">Product</p>
            <a href="{{ route('tutors.index') }}" class="app-footer-link">Browse Tutors</a>
            <a href="{{ route('specialties') }}" class="app-footer-link">Specialties</a>
            <span class="app-footer-link">Group classes</span>
            <a href="{{ route('home') }}#how-it-works" class="app-footer-link">How it works</a>
        </div>

        <div>
            <p class="app-footer-title">For crew</p>
            <a href="{{ route('tutors.index') }}" class="app-footer-link">Pilots</a>
            <a href="{{ route('tutors.index') }}" class="app-footer-link">Cabin Crew</a>
            <a href="{{ route('tutors.index') }}" class="app-footer-link">ATC</a>
            <a href="{{ route('tutors.index') }}" class="app-footer-link">Engineers</a>
        </div>

        <div>
            <p class="app-footer-title">Company</p>
            <a href="{{ route('trust') ?? '#' }}" class="app-footer-link">About</a>
            <a href="{{ route('trust') ?? '#' }}" class="app-footer-link">FAQ</a>
            <a href="#" class="app-footer-link">Contact</a>
            <a href="#" class="app-footer-link">Terms</a>
            <a href="#" class="app-footer-link">Privacy</a>
        </div>
    </div>
    <div class="border-t border-slate-200">
        <div class="container py-4 flex flex-col sm:flex-row sm:items-center sm:justify-between text-xs text-slate-500">
            <span>© {{ date('Y') }} Aviator Tutor. Built by aviation professionals.</span>
            <div class="flex items-center space-x-4 mt-2 sm:mt-0">
                <a href="{{ route('home') }}#how-it-works" class="hover:text-sky-700">How it works</a>
                <a href="{{ route('tutor.apply') }}" class="hover:text-sky-700">Teach</a>
                <a href="{{ route('login') }}" class="hover:text-sky-700">Sign in</a>
            </div>
        </div>
    </div>
</footer>
