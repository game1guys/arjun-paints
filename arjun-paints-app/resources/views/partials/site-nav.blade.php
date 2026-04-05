@php
    $navLink = 'block rounded-xl px-3 py-2 text-base font-medium text-zinc-900 hover:bg-brand-50 hover:text-brand-800';
    $navActive = 'block rounded-xl bg-brand-50 px-3 py-2 text-base font-semibold text-brand-800';
    $desk = 'inline-flex items-center whitespace-nowrap rounded-lg px-1.5 py-1 text-[13px] font-semibold text-zinc-800 transition hover:text-brand-700 lg:px-2 lg:text-sm';
    $deskActive = 'inline-flex items-center whitespace-nowrap rounded-lg px-1.5 py-1 text-[13px] font-bold text-brand-700 lg:px-2 lg:text-sm';
@endphp

<header class="site-header sticky top-0 z-50 border-b border-zinc-200/80 bg-white/95 shadow-sm shadow-brand-900/[0.03] backdrop-blur-md" x-data="{ mobileOpen: false }">
    <div class="mx-auto flex max-w-6xl items-center justify-between gap-3 px-4 py-3 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="group flex min-w-0 shrink-0 items-center gap-1">
            <x-site-logo />
        </a>

        <nav class="scrollbar-none hidden min-w-0 flex-1 items-center justify-end gap-0.5 overflow-x-auto md:flex lg:justify-center lg:gap-1" aria-label="Primary">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? $deskActive : $desk }}">{{ __('Home') }}</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? $deskActive : $desk }}">{{ __('About') }}</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? $deskActive : $desk }}">{{ __('Services') }}</a>
            <a href="{{ route('catalog') }}" class="{{ request()->routeIs('catalog') ? $deskActive : $desk }}">{{ __('Catalog') }}</a>
            <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? $deskActive : $desk }}">{{ __('Gallery') }}</a>
            <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? $deskActive : $desk }}">{{ __('FAQ') }}</a>
            <a href="{{ route('process') }}" class="{{ request()->routeIs('process') ? $deskActive : $desk }}">{{ __('How we work') }}</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? $deskActive : $desk }}">{{ __('Contact') }}</a>
        </nav>

        <div class="flex shrink-0 items-center gap-2 sm:gap-3">
            <a href="tel:+919550555518" class="hidden items-center gap-1.5 text-sm font-semibold text-brand-700 hover:text-brand-800 xl:inline-flex" title="Call us">
                <svg class="h-5 w-5 shrink-0 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                +91 95505 55518
            </a>
            <a href="{{ route('contact') }}" class="site-header-cta hidden rounded-full bg-brand-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-brand-700 sm:inline-flex">
                {{ __('Contact') }}
            </a>
            <button type="button" class="inline-flex rounded-xl p-2 text-ink-900 hover:bg-brand-50 md:hidden" @click="mobileOpen = !mobileOpen" :aria-expanded="mobileOpen">
                <span class="sr-only">Menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-show="!mobileOpen"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-cloak x-show="mobileOpen"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <div x-cloak x-show="mobileOpen" x-transition class="border-t border-zinc-100 bg-white px-4 pb-5 pt-2 md:hidden">
        <nav class="flex flex-col gap-1" aria-label="Mobile">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? $navActive : $navLink }}">{{ __('Home') }}</a>
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? $navActive : $navLink }}">{{ __('About') }}</a>
            <a href="{{ route('services') }}" class="{{ request()->routeIs('services') ? $navActive : $navLink }}">{{ __('Services') }}</a>
            <a href="{{ route('catalog') }}" class="{{ request()->routeIs('catalog') ? $navActive : $navLink }}">{{ __('Catalog') }}</a>
            <a href="{{ route('gallery') }}" class="{{ request()->routeIs('gallery') ? $navActive : $navLink }}">{{ __('Gallery') }}</a>
            <a href="{{ route('faq') }}" class="{{ request()->routeIs('faq') ? $navActive : $navLink }}">{{ __('FAQ') }}</a>
            <a href="{{ route('process') }}" class="{{ request()->routeIs('process') ? $navActive : $navLink }}">{{ __('How we work') }}</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? $navActive : $navLink }}">{{ __('Contact') }}</a>
            <div class="mt-3 flex flex-col gap-2 border-t border-zinc-100 pt-3">
                <a href="{{ route('contact') }}" class="inline-flex justify-center rounded-full bg-brand-600 py-3 text-sm font-semibold text-white">{{ __('Contact us') }}</a>
            </div>
        </nav>
    </div>
</header>
