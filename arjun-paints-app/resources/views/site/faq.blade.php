@extends('layouts.site')

@section('title', 'FAQ')

@section('meta_description', 'Common questions about painting timelines, brands, payments, and service area — Arjun Paints, Suryapet.')

@section('content')
    <x-site-page-hero
        eyebrow="Help"
        title="Frequently asked questions"
        subtitle="Straight answers about how we quote, execute, and support projects — before you pick up the brush (or we do)."
    />

    <section class="bg-soft-blue py-14 sm:py-20">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="space-y-3" x-data="{ open: null }">
                @foreach ($faqs as $i => $item)
                    <div class="overflow-hidden rounded-2xl border border-zinc-200/80 bg-white shadow-sm ring-1 ring-zinc-100">
                        <button
                            type="button"
                            class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left font-display text-base font-semibold text-zinc-900 transition hover:bg-zinc-50/80 sm:text-lg"
                            @click="open = open === {{ $i }} ? null : {{ $i }}"
                            :aria-expanded="(open === {{ $i }}).toString()"
                        >
                            <span>{{ $item['q'] }}</span>
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-cyan-500/15 to-fuchsia-500/15 font-mono text-lg leading-none text-brand-700">
                                <span x-show="open !== {{ $i }}">+</span>
                                <span x-show="open === {{ $i }}" x-cloak>−</span>
                            </span>
                        </button>
                        <div
                            x-show="open === {{ $i }}"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-cloak
                            class="border-t border-zinc-100 px-5 pb-5 pt-0"
                        >
                            <p class="pt-4 text-sm leading-relaxed text-zinc-600 sm:text-base">{{ $item['a'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <p class="mt-10 text-center text-sm text-zinc-600">
                Still unsure? <a href="{{ route('contact') }}" class="font-semibold text-brand-700 hover:underline">Message us</a> or call
                <a href="tel:+919550555518" class="font-semibold text-brand-700 hover:underline">+91 95505 55518</a>.
            </p>
        </div>
    </section>
@endsection
