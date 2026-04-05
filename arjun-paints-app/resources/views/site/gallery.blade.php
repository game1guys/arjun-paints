@extends('layouts.site')

@section('title', 'Gallery')

@section('meta_description', 'Interior, exterior, and commercial painting inspiration from Arjun Paints — Suryapet.')

@section('content')
    <x-site-page-hero
        eyebrow="Inspiration"
        title="Gallery"
        subtitle="A curated look at finishes, textures, and spaces — from cosy homes to busy storefronts. Every project follows the same prep-first discipline."
    />

    <section class="border-b border-zinc-100 bg-white py-14 sm:py-16">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <p class="mx-auto max-w-3xl text-center text-lg leading-relaxed text-zinc-600">
                Colours read differently in morning sun versus evening tube-light. These references help you imagine tone — your final shade is always trialled on your own walls before we scale up.
            </p>
        </div>
    </section>

    <section class="bg-zinc-50 py-14 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-display text-2xl font-bold text-zinc-900 sm:text-3xl">Featured looks</h2>
            <p class="mt-2 text-zinc-600">Homes, elevations, and detail shots from recent briefs.</p>
            <div class="mt-10 grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-4 lg:grid-cols-4">
                @foreach ($galleryImages as $img)
                    <figure class="group relative aspect-square overflow-hidden rounded-2xl ring-1 ring-zinc-200/80">
                        <img src="{{ $img['src'] }}" alt="{{ $img['alt'] }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy" width="800" height="800">
                        <figcaption class="pointer-events-none absolute inset-x-0 bottom-0 bg-gradient-to-t from-zinc-950/80 to-transparent p-3 pt-12 text-xs font-medium text-white opacity-0 transition group-hover:opacity-100">
                            {{ $img['alt'] }}
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-14 sm:py-20">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <h2 class="font-display text-2xl font-bold text-zinc-900 sm:text-3xl">More from the field</h2>
            <p class="mt-2 max-w-2xl text-zinc-600">Commercial, wallpaper, and exterior systems — same attention to masking and curing.</p>
            <div class="mt-10 columns-1 gap-4 sm:columns-2 lg:columns-3">
                @foreach ($extraGallery as $img)
                    <div class="mb-4 break-inside-avoid overflow-hidden rounded-2xl ring-1 ring-zinc-200/80">
                        <img src="{{ $img['src'] }}" alt="{{ $img['alt'] }}" class="w-full object-cover transition hover:opacity-95" loading="lazy" width="1000" height="750">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-pay-gradient py-14 text-center sm:py-16">
        <div class="relative mx-auto max-w-3xl px-4 sm:px-6">
            <h2 class="font-display text-2xl font-bold text-white">Ready to pick shades for your space?</h2>
            <p class="mt-3 text-white/90">Book a consult or visit our Suryapet store — we will map products to your timeline.</p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                <a href="{{ route('contact') }}" class="inline-flex rounded-full bg-white px-8 py-3 text-sm font-semibold text-brand-900 shadow-lg hover:bg-brand-50">Contact us</a>
                <a href="{{ route('catalog') }}" class="inline-flex rounded-full border border-white/40 bg-white/10 px-8 py-3 text-sm font-semibold text-white backdrop-blur-sm hover:bg-white/20">View catalog</a>
            </div>
        </div>
    </section>
@endsection
