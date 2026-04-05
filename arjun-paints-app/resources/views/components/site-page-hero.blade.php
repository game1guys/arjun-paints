@props([
    'title',
    'subtitle' => null,
    'eyebrow' => null,
])

<section {{ $attributes->class('site-page-hero relative overflow-hidden border-b border-zinc-800 bg-slate-950 py-14 sm:py-20') }}>
    <div class="pointer-events-none absolute inset-0 bg-mesh-spectrum opacity-40"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-zinc-950/98 via-zinc-950/95 to-zinc-950"></div>
    <div class="relative mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
        @if ($eyebrow)
            <p class="site-page-hero-eyebrow font-display text-xs font-bold uppercase tracking-[0.25em] text-cyan-200">{{ $eyebrow }}</p>
        @endif
        <h1 class="site-page-hero-title mt-1 font-display text-3xl font-extrabold tracking-tight text-white drop-shadow-md sm:text-5xl sm:leading-tight">{{ $title }}</h1>
        @if ($subtitle)
            <p class="site-page-hero-subtitle mt-4 max-w-2xl text-lg leading-relaxed text-slate-100">{{ $subtitle }}</p>
        @endif
    </div>
</section>
