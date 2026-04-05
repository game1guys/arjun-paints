@extends('layouts.site')

@section('title', 'Catalog & offers')

@section('meta_description', 'Browse products by brand and current offers at Arjun Paints — Suryapet. Asian Paints, Berger, Shalimar.')

@section('content')
    <x-site-page-hero
        eyebrow="Store"
        title="Products &amp; offers"
        subtitle="What we stock — organised by brand — plus current promotions at our Suryapet counter. Prices and shades are confirmed at billing."
    />

    <div class="mx-auto max-w-6xl space-y-16 px-4 py-14 sm:px-6 lg:px-8 lg:py-20">
        @if ($festivalOffers->isNotEmpty())
            <section>
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <h2 class="font-display text-2xl font-bold text-zinc-900 sm:text-3xl">Festival offers</h2>
                        <p class="mt-1 text-sm text-zinc-600">Limited-time seasonal deals — ask at the counter for full terms.</p>
                    </div>
                </div>
                <div class="mt-8 grid gap-6 sm:grid-cols-2">
                    @foreach ($festivalOffers as $offer)
                        <article class="relative overflow-hidden rounded-3xl border border-amber-200/80 bg-gradient-to-br from-amber-50 via-orange-50 to-rose-50 p-8 shadow-lg shadow-amber-900/10">
                            <div class="pointer-events-none absolute -right-8 -top-8 h-32 w-32 rounded-full bg-amber-400/20 blur-2xl"></div>
                            @if ($offer->festival_name)
                                <p class="text-xs font-semibold uppercase tracking-wide text-amber-900">{{ $offer->festival_name }}</p>
                            @endif
                            <h3 class="mt-1 font-display text-xl font-bold text-zinc-900">{{ $offer->title }}</h3>
                            @if ($offer->description)
                                <p class="mt-3 text-sm leading-relaxed text-zinc-700">{{ $offer->description }}</p>
                            @endif
                            <p class="mt-6 font-display text-3xl font-bold text-brand-800">
                                @if ($offer->discount_type === 'percent')
                                    {{ rtrim(rtrim(number_format((float) $offer->discount_value, 2), '0'), '.') }}% off
                                @else
                                    ₹{{ number_format((float) $offer->discount_value, 2) }} off
                                @endif
                            </p>
                            <p class="mt-3 text-xs text-zinc-600">
                                Valid {{ $offer->starts_at->timezone(config('app.timezone'))->format('M j') }} – {{ $offer->ends_at->timezone(config('app.timezone'))->format('M j, Y') }}
                            </p>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        @if ($offers->isNotEmpty())
            <section>
                <h2 class="font-display text-2xl font-bold text-zinc-900 sm:text-3xl">Current offers</h2>
                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($offers as $offer)
                        <article class="rounded-2xl border border-zinc-200/80 bg-white p-6 shadow-md transition hover:shadow-lg">
                            <h3 class="font-display text-lg font-bold text-zinc-900">{{ $offer->title }}</h3>
                            @if ($offer->description)
                                <p class="mt-2 text-sm leading-relaxed text-zinc-600">{{ $offer->description }}</p>
                            @endif
                            <p class="mt-5 text-xl font-semibold text-brand-700">
                                @if ($offer->discount_type === 'percent')
                                    {{ rtrim(rtrim(number_format((float) $offer->discount_value, 2), '0'), '.') }}% off
                                @else
                                    ₹{{ number_format((float) $offer->discount_value, 2) }} off
                                @endif
                            </p>
                            <p class="mt-2 text-xs text-zinc-500">Until {{ $offer->ends_at->timezone(config('app.timezone'))->format('M j, Y') }}</p>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <section>
            <h2 class="font-display text-2xl font-bold text-zinc-900 sm:text-3xl">Products by brand</h2>
            <p class="mt-2 max-w-2xl text-zinc-600">Listing is indicative — stock rotates. Call ahead for bulk or special-order items.</p>

            @forelse ($brands as $brand)
                <div class="mt-10 border-t border-zinc-200 pt-10 first:mt-8 first:border-t-0 first:pt-0">
                    <div class="flex flex-wrap items-start justify-between gap-4">
                        <h3 class="font-display text-xl font-bold text-brand-800 sm:text-2xl">{{ $brand->name }}</h3>
                        <span class="rounded-full bg-zinc-100 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-zinc-600">Authorised range</span>
                    </div>
                    @if ($brand->description)
                        <p class="mt-2 max-w-3xl text-sm text-zinc-600">{{ $brand->description }}</p>
                    @endif
                    @if ($brand->products->isEmpty())
                        <p class="mt-6 rounded-xl border border-dashed border-zinc-200 bg-zinc-50 px-4 py-6 text-sm text-zinc-600">Products coming soon for this brand — please call <a href="tel:+919550555518" class="font-semibold text-brand-700 hover:underline">+91 95505 55518</a>.</p>
                    @else
                        <ul class="mt-6 grid gap-4 sm:grid-cols-2">
                            @foreach ($brand->products as $product)
                                <li class="rounded-2xl border border-zinc-200/80 bg-gradient-to-br from-white to-zinc-50/80 px-5 py-4 shadow-sm">
                                    <span class="font-display font-semibold text-zinc-900">{{ $product->name }}</span>
                                    @if ($product->description)
                                        <p class="mt-2 text-sm text-zinc-600">{{ \Illuminate\Support\Str::limit($product->description, 140) }}</p>
                                    @endif
                                    @if ($product->price !== null)
                                        <p class="mt-3 font-display text-lg font-bold text-brand-800">₹{{ number_format((float) $product->price, 2) }}</p>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @empty
                <div class="mt-8 rounded-2xl border border-zinc-200 bg-zinc-50 px-6 py-10 text-center">
                    <p class="text-zinc-600">Catalog is being updated. Please call <a href="tel:+919550555518" class="font-semibold text-brand-800 hover:underline">+91 95505 55518</a> for availability — we will confirm shades and pack sizes.</p>
                    <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-full bg-brand-600 px-6 py-3 text-sm font-semibold text-white hover:bg-brand-700">Leave a message</a>
                </div>
            @endforelse
        </section>

        <section class="relative overflow-hidden rounded-3xl bg-zinc-950 px-8 py-12 text-center sm:py-14">
            <div class="pointer-events-none absolute inset-0 bg-mesh-spectrum opacity-40"></div>
            <div class="relative">
                <h2 class="font-display text-xl font-bold text-white sm:text-2xl">Questions about stock or shades?</h2>
                <p class="mx-auto mt-2 max-w-lg text-sm text-slate-400">Bring elevation photos or room dimensions — we will help shortlist series and quantities.</p>
                <a href="{{ route('contact') }}" class="mt-8 inline-flex rounded-full bg-white px-8 py-3 text-sm font-semibold text-zinc-950 hover:bg-brand-50">Contact us</a>
            </div>
        </section>
    </div>
@endsection
