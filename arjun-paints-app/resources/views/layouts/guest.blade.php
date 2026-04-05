<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} — {{ __('Login') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|plus-jakarta-sans:600,700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/site-core.css') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen overflow-hidden bg-hero-blue">
            <div class="pointer-events-none absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.06\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
            <div class="relative flex min-h-screen flex-col items-center justify-center px-4 py-10 sm:px-6">
                <a href="{{ route('home') }}" class="mb-8 flex items-center gap-3 rounded-2xl bg-white/10 px-5 py-3 ring-1 ring-white/20 backdrop-blur-sm transition hover:bg-white/15">
                    <x-site-logo variant="light" :compact="true" />
                    <span class="font-display text-lg font-bold text-white">Arjun Paints</span>
                </a>

                <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-2xl shadow-brand-950/30 ring-1 ring-zinc-200/80">
                    {{ $slot }}
                </div>

                <p class="mt-8 text-center text-sm text-blue-100">
                    <a href="{{ route('home') }}" class="font-medium text-white underline decoration-white/40 underline-offset-2 hover:decoration-white">← Back to website</a>
                </p>
            </div>
        </div>
    </body>
</html>
