@extends('layouts.site')

@section('title', 'Contact')

@section('meta_description', 'Visit Arjun Paints in Suryapet, call +91 95505 55518, or send a message — quotes, shade help, and project timelines.')

@section('content')
    <x-site-page-hero
        eyebrow="Get in touch"
        title="Let’s talk"
        subtitle="Call us directly or leave a message — we usually respond within one business day. For urgent site visits, mention your area and preferred time window."
    />

    <div class="mx-auto grid max-w-6xl gap-12 px-4 py-14 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8 lg:py-20">
        <div class="space-y-10">
            <div class="overflow-hidden rounded-3xl shadow-xl ring-1 ring-zinc-200/80">
                <img
                    src="{{ asset('images/stock/home-cta.jpg') }}"
                    alt="Beautiful home exterior"
                    class="aspect-[4/3] w-full object-cover"
                    loading="lazy"
                    width="1200"
                    height="900"
                >
            </div>

            <div>
                <h2 class="font-display text-xl font-bold text-zinc-900">Visit or call</h2>
                <ul class="mt-6 space-y-8 text-zinc-700">
                    <li class="flex gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-cyan-500/20 to-fuchsia-500/20 text-brand-800">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">Address</p>
                            <p class="mt-1 leading-relaxed">Near Bajaj Electronics, opposite Kuda Kuda Road<br>Suryapet, Telangana 508213</p>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-cyan-500/20 to-fuchsia-500/20 text-brand-800">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">Phone</p>
                            <a href="tel:+919550555518" class="mt-1 inline-block text-lg font-semibold text-brand-800 hover:text-brand-950">+91 95505 55518</a>
                        </div>
                    </li>
                    <li class="flex gap-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-cyan-500/20 to-fuchsia-500/20 text-brand-800">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-brand-600">Hours</p>
                            <p class="mt-1">Monday – Saturday · 9:00 – 19:00<br><span class="text-zinc-500">Sunday · closed (messages answered on Monday)</span></p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="rounded-2xl border border-brand-100 bg-brand-50/60 p-6">
                <h3 class="font-display text-sm font-bold text-brand-900">Before you write</h3>
                <ul class="mt-3 list-inside list-disc space-y-2 text-sm text-zinc-700">
                    <li>Rough size of the area (rooms / sq.ft. if known)</li>
                    <li>Interior, exterior, or both</li>
                    <li>Any deadline (festival, lease, shop opening)</li>
                </ul>
            </div>
        </div>

        <div class="rounded-3xl border border-zinc-200/80 bg-gradient-to-b from-white to-zinc-50/80 p-6 shadow-xl shadow-zinc-900/5 sm:p-8">
            @if (session('status'))
                <div class="mb-6 rounded-xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-900 ring-1 ring-emerald-200">
                    {{ session('status') }}
                </div>
            @endif

            <h2 class="font-display text-lg font-bold text-zinc-900">Send a message</h2>
            <p class="mt-1 text-sm text-zinc-600">We read every note — no auto-replies.</p>

            <form method="POST" action="{{ route('contact.submit') }}" class="mt-8 space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-zinc-800">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="mt-1.5 block w-full rounded-xl border-zinc-200 bg-white shadow-sm focus:border-brand-500 focus:ring-brand-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-800">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="mt-1.5 block w-full rounded-xl border-zinc-200 bg-white shadow-sm focus:border-brand-500 focus:ring-brand-500">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="phone" class="block text-sm font-medium text-zinc-800">Phone <span class="text-zinc-400">(optional)</span></label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                        class="mt-1.5 block w-full rounded-xl border-zinc-200 bg-white shadow-sm focus:border-brand-500 focus:ring-brand-500">
                    @error('phone')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-zinc-800">Message</label>
                    <textarea name="message" id="message" rows="5" required
                        class="mt-1.5 block w-full rounded-xl border-zinc-200 bg-white shadow-sm focus:border-brand-500 focus:ring-brand-500">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="w-full rounded-full bg-gradient-to-r from-brand-600 via-brand-600 to-fuchsia-600 px-4 py-3.5 text-sm font-semibold text-white shadow-lg shadow-brand-600/25 transition hover:brightness-105 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                    Send message
                </button>
            </form>
        </div>
    </div>
@endsection
