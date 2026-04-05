@extends('layouts.site')

@section('title', 'How we work')

@section('meta_description', 'Our step-by-step painting process — survey, estimate, prep, topcoats, and handover — Arjun Paints, Suryapet.')

@section('content')
    <x-site-page-hero
        eyebrow="Process"
        title="How we work"
        subtitle="No mystery stages — you always know what is happening on your site, and why we are doing it in that order."
    />

    <section class="process-steps-section relative overflow-hidden bg-white py-14 sm:py-20">
        <div class="relative mx-auto max-w-4xl space-y-12 px-4 sm:px-6 lg:px-8">
            @foreach ($processSteps as $step)
                <article class="process-step-card relative flex flex-col gap-6 rounded-3xl border border-zinc-200 bg-white p-8 shadow-lg lg:flex-row lg:items-start lg:gap-10">
                    <div class="flex shrink-0 items-center justify-center lg:w-28">
                        <span class="process-step-num flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-blue-600 font-display text-xl font-bold text-white shadow-md">{{ $step['step'] }}</span>
                    </div>
                    <div>
                        <h2 class="process-step-title font-display text-xl font-bold text-zinc-900 sm:text-2xl">{{ $step['title'] }}</h2>
                        <p class="process-step-body mt-3 text-base leading-relaxed text-zinc-700">{{ $step['body'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="site-bottom-cta border-t border-zinc-800 bg-zinc-950 py-14 text-white sm:py-16">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6">
            <h2 class="font-display text-2xl font-bold text-white">Want this process on your site?</h2>
            <p class="mt-3 text-slate-200">Share floor plans, photos, or simply call — we will tell you what to expect before we book a visit.</p>
            <a href="{{ route('contact') }}" class="mt-8 inline-flex rounded-full bg-blue-600 px-10 py-3.5 text-sm font-semibold text-white shadow-lg hover:bg-blue-700">
                Start a conversation
            </a>
        </div>
    </section>
@endsection
