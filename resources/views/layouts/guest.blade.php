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
    <body class="font-sans antialiased bg-[var(--at-bg)] text-[var(--at-text-main)]">
        <div class="min-h-screen flex flex-col">
            @include('partials.nav')

            <!-- Page Content: auth pages inject their $slot here -->
            <main class="flex-1 bg-slate-50 flex items-center justify-center px-4 py-8">
                {{ $slot }}
            </main>

            @includeWhen(View::exists('partials.footer'), 'partials.footer')
        </div>
    </body>
</html>
