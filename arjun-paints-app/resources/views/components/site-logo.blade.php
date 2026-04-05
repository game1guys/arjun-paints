@props(['compact' => false, 'variant' => 'dark'])

@php
    $nameClass = $variant === 'light' ? 'text-white' : 'text-zinc-950';
    $taglineClass = $variant === 'light' ? 'text-cyan-200' : 'text-brand-700';
    $locationClass = $variant === 'light' ? 'text-slate-300' : 'text-zinc-600';
    // Logo PNG is circular — lock height only, let width follow aspect (prevents stretch).
    $imgClass = $compact
        ? 'h-10 w-auto max-h-10 max-w-[3.25rem] object-contain object-center sm:h-11 sm:max-h-11 sm:max-w-[3.5rem]'
        : 'h-12 w-auto max-h-12 max-w-[4rem] object-contain object-center sm:h-[3.75rem] sm:max-h-[3.75rem] sm:max-w-[5rem]';
    $imgClass .= $variant === 'light' ? ' drop-shadow-[0_0_24px_rgba(34,211,238,0.35)]' : '';
@endphp

<div {{ $attributes->class($compact ? 'flex min-w-0 shrink-0 items-center gap-0' : 'flex min-w-0 shrink-0 items-center gap-3') }}>
    <div class="flex shrink-0 items-center justify-center">
        <img
            src="{{ asset('images/arjun-paints-logo.png') }}"
            alt="{{ __('Arjun Paints') }}"
            class="{{ $imgClass }}"
            decoding="async"
            loading="{{ $compact ? 'lazy' : 'eager' }}"
        >
    </div>
    @unless ($compact)
        <div class="flex min-w-0 flex-col justify-center leading-snug">
            <span class="font-display text-lg font-bold leading-snug tracking-tight sm:text-xl {{ $nameClass }}">{{ __('Arjun Paints') }}</span>
            <span class="mt-0.5 font-display text-[11px] font-medium leading-normal italic sm:text-xs {{ $taglineClass }}">nature by colours</span>
            <span class="hidden text-[10px] font-semibold uppercase leading-normal tracking-[0.2em] sm:mt-1 sm:block {{ $locationClass }}">Suryapet · India</span>
        </div>
    @endunless
</div>
