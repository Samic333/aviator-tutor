<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Aviator Tutor') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <!-- Shared AviatorTutor header -->
            <header class="border-b bg-white/90 backdrop-blur sticky top-0 z-40">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <!-- Left: Logo -->
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                                <div class="h-8 w-8 rounded-full bg-sky-500 flex items-center justify-center shadow-sm">
                                    <span class="text-white text-sm font-bold">AT</span>
                                </div>
                                <div class="flex flex-col leading-tight">
                                    <span class="font-semibold text-gray-900 text-sm sm:text-base">Aviator Tutor</span>
                                    <span class="text-[11px] text-gray-500 hidden sm:block">Train with real aviation pros</span>
                                </div>
                            </a>
                        </div>

                        <!-- Center: Menu -->
                        <nav class="hidden md:flex items-center space-x-6 text-sm font-medium">
                            <a href="{{ route('home') }}" class="text-gray-700 hover:text-sky-600">Home</a>
                            <a href="{{ route('home') }}#browse" class="text-gray-700 hover:text-sky-600">Browse Tutors</a>
                            <a href="{{ route('home') }}#specialties" class="text-gray-700 hover:text-sky-600">Specialties</a>
                            <a href="{{ route('home') }}#how-it-works" class="text-gray-700 hover:text-sky-600">How it works</a>
                            <a href="{{ route('tutor.apply') }}" class="text-gray-700 hover:text-sky-600">Teach</a>
                        </nav>

                        <!-- Right: Auth links -->
                        <div class="flex items-center space-x-3">
                            @auth
                                @if(Auth::user()->is_admin ?? false)
                                    <a href="{{ route('admin.tutors.index') }}" class="text-sm text-gray-700 hover:text-sky-600 hidden sm:inline-block">
                                        Admin
                                    </a>
                                @endif

                                <a href="{{ route('dashboard') ?? '#' }}" class="text-sm text-gray-700 hover:text-sky-600 hidden sm:inline-block">
                                    Dashboard
                                </a>

                                <span class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                                </span>
                            @endauth

                            @guest
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-sky-600">
                                    Sign in
                                </a>
                                <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-3 py-1.5 rounded-full text-sm font-semibold bg-sky-600 text-white hover:bg-sky-700 shadow-sm">
                                    Join for free
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content: auth pages inject their $slot here -->
            <main class="min-h-screen bg-sky-50/40 flex items-center justify-center px-4">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
