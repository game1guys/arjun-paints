@php
    $link = 'inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium transition';
    $active = $link.' border-brand-600 text-brand-800';
    $idle = $link.' border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700';
@endphp

<nav x-data="{ open: false }" class="border-b border-gray-100 bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex min-w-0 flex-1">
                <div class="flex shrink-0 items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-2">
                        <span class="font-display text-lg font-bold text-brand-800">Arjun Paints</span>
                        <span class="hidden rounded-full bg-brand-100 px-2 py-0.5 text-xs font-semibold text-brand-800 sm:inline">Admin</span>
                    </a>
                </div>

                <div class="hidden min-w-0 flex-1 flex-wrap items-center gap-x-4 gap-y-1 sm:-my-px sm:ms-6 lg:flex lg:gap-x-6">
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? $active : $idle }}">{{ __('Dashboard') }}</a>
                    <a href="{{ route('brands.index') }}" class="{{ request()->routeIs('brands.*') ? $active : $idle }}">{{ __('Brands') }}</a>
                    <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? $active : $idle }}">{{ __('Products') }}</a>
                    <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? $active : $idle }}">{{ __('Users') }}</a>
                    <a href="{{ route('offers.index') }}" class="{{ request()->routeIs('offers.*') && ! request()->routeIs('festival-offers.*') ? $active : $idle }}">{{ __('Offers') }}</a>
                    <a href="{{ route('festival-offers.index') }}" class="{{ request()->routeIs('festival-offers.*') ? $active : $idle }}">{{ __('Festival') }}</a>
                    <a href="{{ route('home') }}" class="{{ $idle }}">{{ __('Website') }}</a>
                </div>
            </div>

            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button type="button" class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button type="button" @click="open = ! open" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="space-y-1 border-t border-gray-100 pb-3 pt-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('brands.index')" :active="request()->routeIs('brands.*')">{{ __('Brands') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">{{ __('Products') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">{{ __('Users') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('offers.index')" :active="request()->routeIs('offers.*') && ! request()->routeIs('festival-offers.*')">{{ __('Offers') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('festival-offers.index')" :active="request()->routeIs('festival-offers.*')">{{ __('Festival offers') }}</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('home')">{{ __('Website') }}</x-responsive-nav-link>
        </div>

        <div class="border-t border-gray-200 pb-1 pt-4">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
