@extends('layouts.site')

@section('title', 'Services')

@section('meta_description', 'Interior, exterior, commercial, residential painting and wallpaper — Arjun Paints, Suryapet. Asian Paints, Berger, Shalimar.')

@section('content')
    <x-site-page-hero
        eyebrow="What we do"
        title="Services"
        subtitle="End-to-end painting and wall solutions — specified for Indian climates, real foot traffic, and the way families actually live in their spaces."
    />

    <section class="border-b border-zinc-100 bg-white py-12 sm:py-16">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-lg leading-relaxed text-zinc-600">
                Every service below includes the same baseline: surface check, compatible primer, recommended topcoats, and a realistic drying schedule — we do not promise “same-day miracles” when chemistry needs time.
            </p>
        </div>
    </section>

    <section class="bg-zinc-50 py-14 sm:py-20">
        <div class="mx-auto max-w-6xl space-y-16 px-4 sm:px-6 lg:px-8">
            @foreach ($detailServices as $i => $s)
                <article class="grid items-center gap-10 lg:grid-cols-2 lg:gap-14">
                    <div class="overflow-hidden rounded-3xl shadow-xl ring-1 ring-zinc-200/80 {{ $i % 2 === 1 ? 'lg:order-2' : '' }}">
                        <img src="{{ $s['image'] }}" alt="{{ $s['title'] }}" class="aspect-[16/11] w-full object-cover" loading="lazy" width="900" height="619">
                    </div>
                    <div class="{{ $i % 2 === 1 ? 'lg:order-1' : '' }}">
                        <h2 class="font-display text-2xl font-bold text-zinc-900 sm:text-3xl">{{ $s['title'] }}</h2>
                        <p class="mt-4 text-base leading-relaxed text-zinc-600">{{ $s['body'] }}</p>
                        <a href="{{ route('contact') }}" class="mt-6 inline-flex text-sm font-semibold text-brand-700 hover:text-brand-900">Discuss this service →</a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section id="process" class="border-t border-zinc-200 bg-white py-14 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-start justify-between gap-6 lg:flex-row lg:items-end">
                <div>
                    <h2 class="font-display text-3xl font-bold text-zinc-900 sm:text-4xl">Our process</h2>
                    <p class="mt-3 max-w-2xl text-lg text-zinc-600">Same sequence for small and large jobs — so you always know what comes next.</p>
                </div>
                <a href="{{ route('process') }}" class="inline-flex rounded-full border border-brand-200 bg-brand-50 px-5 py-2 text-sm font-semibold text-brand-800 hover:bg-brand-100">Full step-by-step →</a>
            </div>
            <ol class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($processSteps as $step)
                    <li class="relative rounded-2xl border border-zinc-200/80 bg-gradient-to-b from-white to-zinc-50 p-5 shadow-sm">
                        <span class="font-display text-xs font-bold uppercase tracking-wider text-brand-600">Step {{ $step['step'] }}</span>
                        <h3 class="mt-2 font-display text-lg font-bold text-zinc-900">{{ $step['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-600">{{ $step['body'] }}</p>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    <section class="relative overflow-hidden bg-pay-gradient py-14 text-center sm:py-16">
        <div class="relative mx-auto max-w-3xl px-4 sm:px-6">
            <h2 class="font-display text-2xl font-bold text-white sm:text-3xl">Not sure where to start?</h2>
            <p class="mt-3 text-white/90">Tell us about your space — we will shortlist products and a realistic schedule.</p>
            <a href="{{ route('contact') }}" class="mt-8 inline-flex rounded-full bg-white px-8 py-3.5 text-sm font-semibold text-brand-900 shadow-xl hover:bg-brand-50">Request a callback</a>
        </div>
    </section>
@endsection
