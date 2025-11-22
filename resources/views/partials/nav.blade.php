<nav x-data="{ open: false }" class="at-navbar bg-white/95 backdrop-blur">
    <div class="container">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center space-x-2">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="h-9 w-9 rounded-full bg-sky-500 flex items-center justify-center shadow-sm">
                            <span class="text-white text-sm font-bold leading-none">AT</span>
                        </div>
                        <div class="flex flex-col leading-tight">
                            <span class="font-semibold text-gray-900 text-sm sm:text-base">Aviator Tutor</span>
                            <span class="text-[11px] text-gray-500 hidden sm:block">Train with real aviation pros</span>
                        </div>
                    </a>
                </div>

                <!-- Primary Nav -->
                <div class="hidden md:flex space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <a href="{{ route('home') }}" class="text-sm font-medium text-gray-700 hover:text-sky-600">Home</a>
                    <a href="{{ route('home') }}#browse" class="text-sm font-medium text-gray-700 hover:text-sky-600">Browse Tutors</a>
                    <a href="{{ route('home') }}#specialties" class="text-sm font-medium text-gray-700 hover:text-sky-600">Specialties</a>
                    <a href="{{ route('home') }}#how-it-works" class="text-sm font-medium text-gray-700 hover:text-sky-600">How it works</a>
                    <a href="{{ route('tutor.apply') }}" class="text-sm font-medium text-gray-700 hover:text-sky-600">Teach</a>
                </div>
            </div>

            <!-- Desktop Actions -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 space-x-3">
                @auth
                    @if(Auth::user()->is_admin ?? false)
                        <a href="{{ route('admin.tutors.index') }}" class="text-sm text-gray-700 hover:text-sky-600">Admin</a>
                    @endif

                    <a href="{{ route('dashboard') ?? '#' }}" class="text-sm text-gray-700 hover:text-sky-600">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="hidden sm:inline-block">
                        @csrf
                        <button type="submit" class="text-sm text-gray-700 hover:text-sky-600">
                            Logout
                        </button>
                    </form>

                    @if (Route::has('profile.show'))
                        <a href="{{ route('profile.show') }}" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </span>
                    @endif
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-sky-600">Sign in</a>
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-3 py-1.5 rounded-full text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700 shadow-sm">
                        Join for free
                    </a>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-700 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': ! open }" class="hidden sm:hidden border-t border-gray-200 bg-white/95 backdrop-blur">
        <div class="pt-4 pb-3 space-y-1 px-4">
            <a href="{{ route('home') }}" class="block text-sm font-medium text-gray-700 hover:text-sky-600">Home</a>
            <a href="{{ route('home') }}#browse" class="block text-sm font-medium text-gray-700 hover:text-sky-600">Browse Tutors</a>
            <a href="{{ route('home') }}#specialties" class="block text-sm font-medium text-gray-700 hover:text-sky-600">Specialties</a>
            <a href="{{ route('home') }}#how-it-works" class="block text-sm font-medium text-gray-700 hover:text-sky-600">How it works</a>
            <a href="{{ route('tutor.apply') }}" class="block text-sm font-medium text-gray-700 hover:text-sky-600">Teach</a>
        </div>

        <div class="border-t border-gray-200 pt-4 pb-4 px-4 space-y-2">
            @auth
                @if(Auth::user()->is_admin ?? false)
                    <a href="{{ route('admin.tutors.index') }}" class="block text-sm font-medium text-gray-700 hover:text-sky-600">Admin</a>
                @endif
                <a href="{{ route('dashboard') ?? '#' }}" class="block text-sm font-medium text-gray-700 hover:text-sky-600">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left text-sm font-medium text-gray-700 hover:text-sky-600">Logout</button>
                </form>
                <div class="flex items-center space-x-3">
                    @if (Route::has('profile.show'))
                        <a href="{{ route('profile.show') }}" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </a>
                    @else
                        <span class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                        </span>
                    @endif
                    <span class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</span>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="block text-sm font-medium text-gray-700 hover:text-sky-600">Sign in</a>
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-3 py-1.5 rounded-full text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700 shadow-sm">
                    Join for free
                </a>
            @endguest
        </div>
    </div>
</nav>
