<nav x-data="{ open: false }" class="bg-white/95 backdrop-blur border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Left: logo + main nav --}}
            <div class="flex items-center space-x-4">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <div class="h-9 w-9 rounded-full bg-sky-500 flex items-center justify-center shadow-sm">
                        <span class="text-white text-sm font-bold leading-none">AT</span>
                    </div>
                    <div class="flex flex-col leading-tight">
                        <span class="font-semibold text-slate-900 text-sm sm:text-base">
                            Aviator Tutor
                        </span>
                        <span class="text-[11px] text-slate-500 hidden sm:block">
                            Train with real aviation pros
                        </span>
                    </div>
                </a>

                {{-- Desktop menu --}}
                <div class="hidden md:flex items-center space-x-6 mt-0.5">
                    <a href="{{ route('home') }}"
                       class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                        Home
                    </a>
                    <a href="{{ route('tutors.index') }}"
                       class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                        Browse Tutors
                    </a>
                    <a href="{{ route('specialties') }}"
                       class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                        Specialties
                    </a>
                    <a href="{{ route('trust') }}"
                       class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                        How it works
                    </a>
                    <a href="{{ route('tutor.apply') }}"
                       class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                        Teach
                    </a>
                </div>
            </div>

            {{-- Right: auth / buttons (desktop) --}}
            <div class="hidden sm:flex items-center space-x-4">
                @auth
                    @if(Auth::user()->is_admin ?? false)
                        <a href="{{ route('admin.tutors.index') }}"
                           class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                            Admin
                        </a>
                    @endif

                    <a href="{{ route('dashboard') ?? '#' }}"
                       class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                        Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="inline-block">
                        @csrf
                        <button type="submit"
                                class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                            Logout
                        </button>
                    </form>

                    @if (Route::has('profile.show'))
                        <a href="{{ route('profile.show') }}"
                           class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </span>
                    @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                       class="text-[15px] font-medium text-slate-800 hover:text-sky-600 transition">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center justify-center px-4 py-2 rounded-full text-[15px] font-semibold bg-sky-600 text-white hover:bg-sky-700 shadow-sm">
                        Join for free
                    </a>
                @endguest
            </div>

            {{-- Mobile menu button --}}
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none focus:bg-slate-100 focus:text-slate-700 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu panel --}}
    <div :class="{ 'block': open, 'hidden': ! open }"
         class="hidden sm:hidden border-t border-slate-200 bg-white/95 backdrop-blur">
        <div class="pt-4 pb-3 space-y-2 px-4">
            <a href="{{ route('home') }}"
               class="block text-[15px] font-medium text-slate-800 hover:text-sky-600">
                Home
            </a>
            <a href="{{ route('tutors.index') }}"
               class="block text-[15px] font-medium text-slate-800 hover:text-sky-600">
                Browse Tutors
            </a>
            <a href="{{ route('specialties') }}"
               class="block text-[15px] font-medium text-slate-800 hover:text-sky-600">
                Specialties
            </a>
            <a href="{{ route('trust') }}"
               class="block text-[15px] font-medium text-slate-800 hover:text-sky-600">
                How it works
            </a>
            <a href="{{ route('tutor.apply') }}"
               class="block text-[15px] font-medium text-slate-800 hover:text-sky-600">
                Teach
            </a>
        </div>

        <div class="border-t border-slate-200 pt-4 pb-4 px-4 space-y-2">
            @auth
                @if(Auth::user()->is_admin ?? false)
                    <a href="{{ route('admin.tutors.index') }}"
                       class="block text-[15px] font-medium text-slate-800 hover:text-sky-600">
                        Admin
                    </a>
                @endif

                <a href="{{ route('dashboard') ?? '#' }}"
                   class="block text-[15px] font-medium text-slate-800 hover:text-sky-600">
                    Dashboard
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="block text-left w-full text-[15px] font-medium text-slate-800 hover:text-sky-600">
                        Logout
                    </button>
                </form>

                <div class="flex items-center space-x-3 pt-2">
                    @if (Route::has('profile.show'))
                        <a href="{{ route('profile.show') }}"
                           class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </span>
                    @endif
                    <span class="text-[15px] font-medium text-slate-900">
                        {{ Auth::user()->name }}
                    </span>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}"
                   class="block text-[15px] font-medium text-slate-800 hover:text-sky-600">
                    Sign in
                </a>
                <a href="{{ route('register') }}"
                   class="inline-flex items-center justify-center px-4 py-2 rounded-full text-[15px] font-semibold bg-sky-600 text-white hover:bg-sky-700 shadow-sm mt-1">
                    Join for free
                </a>
            @endguest
        </div>
    </div>
</nav>
