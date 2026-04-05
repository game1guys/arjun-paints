<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', 'Arjun Paints — quality interior, exterior, commercial & residential painting in Suryapet. Asian Paints, Berger, Shalimar. 25+ years.')">

    <title>@yield('title', 'Arjun Paints') — {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|plus-jakarta-sans:500,600,700,800&display=swap" rel="stylesheet" />
    {{-- Plain CSS: visible text even when npm run build / Vite has not been run --}}
    <link rel="stylesheet" href="{{ asset('css/site-core.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-zinc-900">
    @include('partials.site-nav')

    <main>
        @yield('content')
    </main>

    @include('partials.site-footer')

    @include('partials.site-float-actions')
</body>
</html>
