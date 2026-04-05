@extends('layouts.site')

@section('title', 'Quality painting in Suryapet')

@section('content')
    {{-- Hero — site-core.css guarantees text contrast if Tailwind/Vite missing --}}
    <section id="site-hero" class="relative overflow-hidden bg-slate-950">
        <img
            src="{{ asset('images/stock/hero-texture.jpg') }}"
            alt=""
            class="site-hero-bg pointer-events-none absolute inset-0 h-full w-full object-cover opacity-[0.12] mix-blend-overlay"
            width="1920"
            height="1080"
            decoding="async"
            aria-hidden="true"
        >
        <div class="site-hero-overlay pointer-events-none absolute inset-0 bg-gradient-to-b from-slate-950/95 via-slate-950/92 to-slate-950" aria-hidden="true"></div>
        <div class="site-hero-mesh pointer-events-none absolute inset-0 bg-mesh-spectrum opacity-40" aria-hidden="true"></div>
        <div class="site-hero-blob absolute -right-24 top-1/2 h-[min(90vw,28rem)] w-[min(90vw,28rem)] -translate-y-1/2 rounded-full bg-gradient-to-br from-cyan-500/20 via-fuchsia-500/15 to-amber-400/10 blur-3xl" aria-hidden="true"></div>

        <div class="relative z-10 mx-auto grid max-w-6xl items-center gap-12 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_0.95fr] lg:gap-16 lg:py-24 lg:px-8">
            <div class="site-hero-copy rounded-2xl bg-slate-950/80 p-6 shadow-2xl ring-1 ring-white/15 backdrop-blur-md sm:p-8">
                <p class="font-display text-sm font-semibold uppercase tracking-[0.25em] text-cyan-200">Suryapet · Telangana</p>
                <h1 class="mt-4 font-display text-4xl font-extrabold leading-[1.12] tracking-tight text-white drop-shadow-[0_2px_12px_rgba(0,0,0,0.65)] sm:text-5xl lg:text-[2.85rem] lg:leading-[1.08]">
                    Calm, confident painting — <span class="site-hero-accent text-cyan-200 underline decoration-cyan-500/40 underline-offset-4">nature by colours</span> with Arjun Paints
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-relaxed text-slate-100 sm:text-xl">
                    Thoughtful prep, authorised partners, and crews who respect your floors and your timeline — for homes, shops, and workplaces that need to look their best without drama.
                </p>
                <div class="mt-10 flex flex-wrap gap-3">
                    <a href="{{ route('services') }}" class="site-hero-btn-primary inline-flex items-center justify-center rounded-full bg-brand-600 px-8 py-3.5 text-sm font-semibold text-white shadow-lg shadow-black/40 transition hover:bg-brand-700">
                        Explore services
                    </a>
                    <a href="{{ route('contact') }}" class="site-hero-btn-secondary inline-flex items-center justify-center rounded-full border-2 border-white bg-white/15 px-8 py-3.5 text-sm font-semibold text-white shadow-md backdrop-blur-sm transition hover:bg-white/25">
                        Get a quote
                    </a>
                </div>
                <dl class="mt-12 grid grid-cols-3 gap-4 border-t border-white/20 pt-8 text-center sm:max-w-md sm:text-left">
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-200">Experience</dt>
                        <dd class="mt-1 font-display text-2xl font-bold text-white drop-shadow-sm">25+ yrs</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-200">Brands</dt>
                        <dd class="mt-1 font-display text-2xl font-bold text-white drop-shadow-sm">Authorised</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-bold uppercase tracking-wider text-slate-200">Focus</dt>
                        <dd class="mt-1 font-display text-2xl font-bold text-white drop-shadow-sm">Craft</dd>
                    </div>
                </dl>
            </div>

            <div class="relative">
                <div class="pointer-events-none absolute -inset-4 rounded-[2rem] bg-gradient-to-br from-cyan-500/30 via-fuchsia-500/20 to-amber-400/20 opacity-60 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-4xl shadow-2xl shadow-black/40 ring-1 ring-white/10">
                    <img
                        src="{{ asset('images/stock/interior-hero.jpg') }}"
                        alt="Colourful modern interior"
                        class="aspect-[4/3] w-full object-cover sm:aspect-[5/4]"
                        width="1200"
                        height="960"
                        loading="eager"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-950/80 via-transparent to-transparent"></div>
                    <p class="absolute bottom-4 left-4 right-4 text-sm font-medium text-white/90 drop-shadow-md">Premium finishes · lived-in comfort</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Trusted experts — light band with image + glass cards --}}
    <section class="relative border-y border-zinc-200/80 bg-gradient-to-b from-white via-brand-50/40 to-white py-16 sm:py-20">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-cyan-400/40 to-transparent"></div>
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-display text-3xl font-bold text-zinc-900 sm:text-4xl">Trusted Indian paint partners</h2>
            <p class="mx-auto mt-3 max-w-2xl text-center text-lg text-zinc-600">
                A Suryapet-born team that grew from ladders and rollers into structured projects — still grounded in the same hands-on honesty.
            </p>
            <div class="mt-14 grid gap-12 lg:grid-cols-3 lg:gap-10">
                <div class="text-center lg:text-left">
                    <p class="leading-relaxed text-zinc-600">
                        We do not believe in “quick coats.” Surfaces are inspected, cracks are addressed, and primers are chosen for Telangana heat and monsoon cycles — so colour stays true longer than a season.
                    </p>
                </div>
                <div class="group relative overflow-hidden rounded-3xl shadow-xl ring-1 ring-zinc-200/80">
                    <img src="{{ asset('images/stock/team.jpg') }}" alt="Painting team at work" class="aspect-[3/4] w-full object-cover transition duration-700 group-hover:scale-105" loading="lazy" width="900" height="1200">
                    <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/50 to-transparent opacity-0 transition group-hover:opacity-100"></div>
                </div>
                <div class="space-y-4">
                    <div class="rounded-2xl border border-white/60 bg-white/80 p-5 shadow-lg shadow-brand-900/5 backdrop-blur-sm ring-1 ring-brand-100/80">
                        <p class="font-display text-xs font-bold uppercase tracking-wider text-brand-700">Vision</p>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-700">Make premium painting feel approachable — clear scope, fair pricing, finishes you are proud to show neighbours.</p>
                    </div>
                    <div class="rounded-2xl border border-white/60 bg-white/80 p-5 shadow-lg shadow-brand-900/5 backdrop-blur-sm ring-1 ring-brand-100/80">
                        <p class="font-display text-xs font-bold uppercase tracking-wider text-brand-700">Mission</p>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-700">Deliver durable, beautiful surfaces using authorised brands and disciplined site habits — every single project.</p>
                    </div>
                    <div class="rounded-2xl border border-white/60 bg-white/80 p-5 shadow-lg shadow-brand-900/5 backdrop-blur-sm ring-1 ring-brand-100/80">
                        <p class="font-display text-xs font-bold uppercase tracking-wider text-brand-700">Value</p>
                        <p class="mt-2 text-sm leading-relaxed text-zinc-700">Honesty over hype: if a shade or product is wrong for your wall, we will say so before it costs you twice.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($partnerBrands->isNotEmpty())
        <section class="border-y border-white/10 bg-zinc-950 py-10 sm:py-12">
            <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                <p class="text-center font-display text-xs font-semibold uppercase tracking-[0.3em] text-cyan-300/80">Authorised partners</p>
                <div class="mt-6 flex flex-wrap items-center justify-center gap-x-10 gap-y-4">
                    @foreach ($partnerBrands as $b)
                        <span class="font-display text-lg font-bold text-white/95 sm:text-xl">{{ $b->name }}</span>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Testimonials --}}
    <section class="relative overflow-hidden bg-gradient-to-b from-white via-brand-50/30 to-white py-16 sm:py-20">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-fuchsia-400/30 to-transparent"></div>
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-display text-3xl font-bold text-zinc-900 sm:text-4xl">What people say</h2>
            <p class="mx-auto mt-3 max-w-2xl text-center text-zinc-600">Real feedback — edited only for length, not for praise.</p>
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($testimonials as $t)
                    <blockquote class="rounded-3xl border border-zinc-200/80 bg-white p-8 shadow-lg shadow-zinc-900/5">
                        <p class="text-base leading-relaxed text-zinc-700">“{{ $t['quote'] }}”</p>
                        <footer class="mt-6 border-t border-zinc-100 pt-5">
                            <p class="font-display text-sm font-semibold text-zinc-900">{{ $t['name'] }}</p>
                            <p class="mt-1 text-xs font-medium uppercase tracking-wider text-brand-600">{{ $t['note'] }}</p>
                        </footer>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Deeper promise --}}
    <section class="border-y border-zinc-100 bg-zinc-50 py-16 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-display text-3xl font-bold text-zinc-900 sm:text-4xl">Beyond the brush</h2>
            <p class="mx-auto mt-3 max-w-2xl text-center text-zinc-600">Three things you get before the first coat — every time.</p>
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($highlights as $h)
                    <article class="rounded-3xl border border-zinc-200/80 bg-white p-8 shadow-md">
                        <div class="h-1 w-12 rounded-full bg-gradient-to-r from-cyan-400 to-fuchsia-500"></div>
                        <h3 class="mt-5 font-display text-lg font-bold text-zinc-900">{{ $h['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-zinc-600">{{ $h['body'] }}</p>
                    </article>
                @endforeach
            </div>
            <div class="mt-12 flex flex-wrap justify-center gap-4 text-center">
                <a href="{{ route('process') }}" class="inline-flex rounded-full bg-brand-600 px-8 py-3 text-sm font-semibold text-white shadow-lg hover:bg-brand-700">See how we work</a>
                <a href="{{ route('faq') }}" class="inline-flex rounded-full border border-zinc-300 bg-white px-8 py-3 text-sm font-semibold text-zinc-800 hover:bg-zinc-50">Read FAQ</a>
            </div>
        </div>
    </section>

    {{-- Brand-wise service grids --}}
    @foreach ($brandsForSections as $brand)
        <section class="border-b border-zinc-100 bg-zinc-50/90 py-16 last:border-b-0 sm:py-20">
            <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <h2 class="font-display text-3xl font-bold text-zinc-900 sm:text-4xl">{{ $brand->name }}</h2>
                        <p class="mt-3 max-w-3xl text-lg text-zinc-600">
                            {{ $brand->description ?? 'Authorised materials and application methods tuned to Indian substrates — we help you pick sheen, series, and quantity without upsell noise.' }}
                        </p>
                    </div>
                    <span class="hidden rounded-full bg-gradient-to-r from-cyan-500/15 via-fuchsia-500/15 to-amber-400/15 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-zinc-700 ring-1 ring-zinc-200/80 sm:inline-block">Full range</span>
                </div>
                <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($serviceShowcase as $card)
                        <article class="group overflow-hidden rounded-2xl bg-white shadow-md ring-1 ring-zinc-200/80 transition hover:-translate-y-1 hover:shadow-xl hover:shadow-brand-600/10">
                            <div class="relative aspect-[16/11] overflow-hidden">
                                <div class="absolute inset-x-0 top-0 z-10 h-1 bg-gradient-to-r from-cyan-400 via-fuchsia-500 to-amber-400 opacity-90"></div>
                                <img src="{{ $card['image'] }}" alt="{{ $card['title'] }} — {{ $brand->name }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105" loading="lazy" width="900" height="618">
                                <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/40 via-transparent to-transparent opacity-0 transition group-hover:opacity-100"></div>
                            </div>
                            <div class="p-5">
                                <h3 class="font-display text-lg font-bold text-zinc-900">{{ $card['title'] }}</h3>
                                <p class="mt-2 text-sm leading-relaxed text-zinc-600">{{ $card['excerpt'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    {{-- Why choose — dark + spectrum numbers --}}
    <section class="relative overflow-hidden bg-zinc-950 py-16 text-white sm:py-24">
        <div class="pointer-events-none absolute inset-0 bg-mesh-spectrum opacity-40"></div>
        <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-display text-3xl font-bold sm:text-4xl">Why choose Arjun Paints</h2>
            <p class="mx-auto mt-3 max-w-2xl text-center text-slate-400">
                Four reasons families and business owners come back — none of them are buzzwords; all of them show up on site.
            </p>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($whyChoose as $i => $item)
                    <article class="rounded-2xl border border-white/10 bg-white/[0.04] p-6 shadow-lg shadow-black/20 backdrop-blur-sm transition hover:border-cyan-400/30 hover:bg-white/[0.07] sm:text-left">
                        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-400 via-fuchsia-500 to-amber-400 font-display text-xl font-bold text-white shadow-glow-cyan sm:mx-0">{{ $i + 1 }}</div>
                        <h3 class="mt-5 font-display text-lg font-bold text-white">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-slate-400">{{ $item['body'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Gallery — bento --}}
    <section id="gallery" class="bg-soft-blue py-16 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-display text-3xl font-bold text-zinc-900 sm:text-4xl">Colours of expertise</h2>
            <p class="mx-auto mt-3 max-w-2xl text-center text-zinc-600">
                A glimpse of the calm, light-filled spaces we help create — interiors, exteriors, and workplaces across residential and commercial briefs.
            </p>
            <div class="mt-6 flex justify-center">
                <a href="{{ route('gallery') }}" class="inline-flex items-center gap-2 rounded-full border border-brand-200 bg-white px-5 py-2 text-sm font-semibold text-brand-800 shadow-sm hover:bg-brand-50">
                    View full gallery
                    <span aria-hidden="true">→</span>
                </a>
            </div>
            <div class="mt-10 grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 sm:grid-rows-[minmax(0,1fr)_minmax(0,1fr)_auto]">
                @foreach ($galleryImages as $idx => $img)
                    @php
                        $cell = match ($idx) {
                            0 => 'sm:col-span-2 sm:row-span-2 sm:min-h-[260px] lg:min-h-[300px]',
                            default => 'aspect-square sm:aspect-auto sm:min-h-[120px]',
                        };
                    @endphp
                    <div class="group relative overflow-hidden rounded-2xl ring-1 ring-zinc-200/80 {{ $cell }}">
                        <img src="{{ $img['src'] }}" alt="{{ $img['alt'] }}" class="h-full min-h-[140px] w-full object-cover transition duration-500 group-hover:scale-[1.04] sm:min-h-0" loading="lazy" width="1000" height="1000">
                        <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/50 via-transparent to-transparent opacity-0 transition group-hover:opacity-100"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Connect CTA + image --}}
    <section class="border-y border-zinc-100 bg-white py-16 sm:py-20">
        <div class="mx-auto grid max-w-6xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8">
            <div class="order-2 lg:order-1">
                <h2 class="font-display text-3xl font-bold text-zinc-900 sm:text-4xl">Connect with Arjun Paints</h2>
                <p class="mt-4 text-lg text-zinc-600">Tell us about your space — we will reply with next steps, usually within one business day.</p>
                <ul class="mt-6 space-y-3 text-sm text-zinc-600">
                    <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-gradient-to-r from-cyan-400 to-fuchsia-500"></span> Shade shortlists & quantity guidance</li>
                    <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-gradient-to-r from-fuchsia-500 to-amber-400"></span> Site visit scheduling when needed</li>
                    <li class="flex gap-2"><span class="mt-1.5 h-1.5 w-1.5 shrink-0 rounded-full bg-gradient-to-r from-amber-400 to-cyan-400"></span> Clear timelines before work begins</li>
                </ul>
                <a href="{{ route('contact') }}" class="mt-10 inline-flex rounded-full bg-brand-600 px-10 py-3.5 text-sm font-semibold text-white shadow-lg shadow-brand-600/25 transition hover:bg-brand-700">
                    Open contact form
                </a>
            </div>
            <div class="order-1 overflow-hidden rounded-4xl shadow-xl ring-1 ring-zinc-200/80 lg:order-2">
                <img
                    src="{{ asset('images/stock/home-cta.jpg') }}"
                    alt="Beautiful home exterior"
                    class="aspect-[4/3] w-full object-cover"
                    width="1000"
                    height="750"
                    loading="lazy"
                >
            </div>
        </div>
    </section>

    {{-- Scan & pay — spectrum band --}}
    <section class="relative overflow-hidden bg-pay-gradient py-14 sm:py-16">
        <img
            src="{{ asset('images/stock/abstract.jpg') }}"
            alt=""
            class="pointer-events-none absolute inset-0 h-full w-full object-cover opacity-15 mix-blend-soft-light"
            width="1200"
            height="800"
            aria-hidden="true"
        >
        <div class="relative mx-auto max-w-4xl px-4 text-center sm:px-6">
            <h2 class="font-display text-xl font-bold text-white drop-shadow-md sm:text-2xl">Scan &amp; pay at the store</h2>
            <p class="mt-2 text-base font-medium text-white drop-shadow-sm">UPI — scan with any supported app at billing.</p>
            <div class="mx-auto mt-8 max-w-xs rounded-2xl bg-white/95 p-5 shadow-2xl shadow-black/25 ring-1 ring-white/40 backdrop-blur-sm sm:p-6">
                <div class="flex justify-center rounded-xl bg-zinc-950 p-3 ring-1 ring-zinc-800">
                    <img
                        src="{{ asset('images/arjun-paints-qr.png') }}"
                        alt="{{ __('Arjun Paints — UPI QR') }}"
                        class="h-auto w-full max-w-[260px] object-contain"
                        width="260"
                        height="260"
                        loading="lazy"
                        decoding="async"
                    >
                </div>
                <p class="mt-4 text-center text-sm font-semibold text-zinc-800">BHIM · Google Pay · PhonePe · Paytm</p>
            </div>
        </div>
    </section>
@endsection
