@extends('layouts.site')

@section('title', 'About us')

@section('meta_description', 'The Arjun Paints story — 25+ years in Suryapet, trusted brands, and a team focused on prep, clarity, and long-lasting finishes.')

@section('content')
    <x-site-page-hero
        eyebrow="Arjun Paints"
        title="Our story"
        subtitle="We grew from ladders and local referrals into a structured painting partner — without losing the honesty that built our name in Suryapet and nearby towns."
    />

    <section class="relative overflow-hidden bg-white py-14 sm:py-20">
        <div class="mx-auto grid max-w-6xl gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:gap-16 lg:px-8">
            <div class="prose prose-lg max-w-none text-zinc-700 prose-p:leading-relaxed">
                <p>
                    For more than <strong>twenty-five years</strong> we have painted homes, shops, schools, and warehouses across Telangana. We learned early that “one more coat” never fixes bad prep — so every job starts with honest surface inspection, not a sales pitch.
                </p>
                <p>
                    Today we work with India’s leading paint brands — <strong>Asian Paints</strong>, <strong>Berger</strong>, and <strong>Shalimar</strong> — so you get authentic products, correct thinning ratios, and warranty-backed systems where they apply. Our role is to translate datasheets into something that survives Indian heat, dust, and monsoon on <em>your</em> walls.
                </p>
                <p>
                    Whether you are repainting one room or an entire elevation, you get the same discipline: clear scope, named products in the estimate, and crews who respect your floors, neighbours, and timelines.
                </p>
            </div>
            <div class="relative">
                <div class="pointer-events-none absolute -inset-2 rounded-[2rem] bg-gradient-to-br from-cyan-500/20 via-fuchsia-500/15 to-amber-400/15 blur-2xl"></div>
                <div class="relative overflow-hidden rounded-3xl shadow-2xl ring-1 ring-zinc-200/80">
                    <img
                        src="{{ asset('images/stock/team.jpg') }}"
                        alt="Professional painting on site"
                        class="aspect-[4/5] w-full object-cover"
                        width="1000"
                        height="1250"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
    </section>

    <section class="border-y border-zinc-200 bg-zinc-50 py-14 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-center font-display text-3xl font-bold text-zinc-900 sm:text-4xl">Milestones</h2>
            <p class="mx-auto mt-3 max-w-2xl text-center text-zinc-600">Not dates on a trophy — moments that changed how we work.</p>
            <div class="mt-12 grid gap-8 md:grid-cols-3">
                @foreach ($milestones as $m)
                    <article class="rounded-2xl border border-zinc-200/80 bg-white p-6 shadow-md">
                        <p class="font-display text-sm font-bold uppercase tracking-wider text-brand-600">{{ $m['year'] }}</p>
                        <h3 class="mt-2 font-display text-xl font-bold text-zinc-900">{{ $m['title'] }}</h3>
                        <p class="mt-3 text-sm leading-relaxed text-zinc-600">{{ $m['body'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-3">
                <div class="rounded-3xl border border-brand-100 bg-gradient-to-br from-brand-50 to-white p-8 shadow-sm lg:col-span-1">
                    <h2 class="font-display text-2xl font-bold text-zinc-900">Vision</h2>
                    <p class="mt-4 leading-relaxed text-zinc-600">To be remembered as the most dependable painting partner in the region — known for honest advice and finishes that age gracefully.</p>
                </div>
                <div class="rounded-3xl border border-brand-100 bg-gradient-to-br from-brand-50 to-white p-8 shadow-sm lg:col-span-1">
                    <h2 class="font-display text-2xl font-bold text-zinc-900">Mission</h2>
                    <p class="mt-4 leading-relaxed text-zinc-600">Deliver predictable, beautiful results through skilled crews, clear communication, and materials matched to each surface and budget.</p>
                </div>
                <div class="rounded-3xl border border-brand-100 bg-gradient-to-br from-brand-50 to-white p-8 shadow-sm lg:col-span-1">
                    <h2 class="font-display text-2xl font-bold text-zinc-900">Values</h2>
                    <p class="mt-4 leading-relaxed text-zinc-600">Quality without shortcuts, respect for your time and property, and long-term relationships over one-off jobs.</p>
                </div>
            </div>

            <div class="mt-16">
                <h2 class="text-center font-display text-2xl font-bold text-zinc-900 sm:text-3xl">How we behave on site</h2>
                <div class="mt-10 grid gap-6 md:grid-cols-3">
                    @foreach ($teamValues as $v)
                        <div class="rounded-2xl border border-zinc-200/80 bg-zinc-50/80 p-6">
                            <h3 class="font-display text-lg font-bold text-brand-800">{{ $v['title'] }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-zinc-600">{{ $v['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-zinc-950 py-14 text-white sm:py-16">
        <div class="pointer-events-none absolute inset-0 bg-mesh-spectrum opacity-30"></div>
        <div class="relative mx-auto max-w-3xl px-4 text-center sm:px-6">
            <h2 class="font-display text-2xl font-bold sm:text-3xl">Meet us at the store</h2>
            <p class="mt-3 text-slate-400">Near Bajaj Electronics, opposite Kuda Kuda Road — Suryapet. Call ahead if you are bringing large swatches or elevation photos.</p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('contact') }}" class="inline-flex rounded-full bg-white px-8 py-3 text-sm font-semibold text-zinc-950 hover:bg-brand-50">Contact form</a>
                <a href="tel:+919550555518" class="inline-flex rounded-full border border-white/25 px-8 py-3 text-sm font-semibold text-white hover:bg-white/10">Call now</a>
            </div>
        </div>
    </section>
@endsection
