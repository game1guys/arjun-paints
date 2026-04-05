@php
    $starts = old('starts_at', $offer->starts_at?->timezone(config('app.timezone'))->format('Y-m-d\TH:i'));
    $ends = old('ends_at', $offer->ends_at?->timezone(config('app.timezone'))->format('Y-m-d\TH:i'));
    $festInit = filter_var(old('is_festival', $offer->is_festival), FILTER_VALIDATE_BOOLEAN);
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-semibold text-ink-900">{{ __('Edit offer') }}</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
            @include('admin.partials.flash')

            <form method="POST" action="{{ route('offers.update', $offer) }}" class="space-y-6 rounded-lg bg-white p-6 shadow-sm sm:p-8" x-data="{ festival: {{ $festInit ? 'true' : 'false' }} }">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $offer->title)" required />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500">{{ old('description', $offer->description) }}</textarea>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <x-input-label for="discount_type" :value="__('Discount type')" />
                        <select id="discount_type" name="discount_type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            <option value="percent" @selected(old('discount_type', $offer->discount_type) === 'percent')>{{ __('Percent') }}</option>
                            <option value="fixed" @selected(old('discount_type', $offer->discount_type) === 'fixed')>{{ __('Fixed amount (₹)') }}</option>
                        </select>
                    </div>
                    <div>
                        <x-input-label for="discount_value" :value="__('Value')" />
                        <x-text-input id="discount_value" name="discount_value" type="number" step="0.01" min="0" class="mt-1 block w-full" :value="old('discount_value', $offer->discount_value)" required />
                        <x-input-error :messages="$errors->get('discount_value')" class="mt-2" />
                    </div>
                </div>
                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <x-input-label for="starts_at" :value="__('Starts at')" />
                        <x-text-input id="starts_at" name="starts_at" type="datetime-local" class="mt-1 block w-full" value="{{ $starts }}" required />
                        <x-input-error :messages="$errors->get('starts_at')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label for="ends_at" :value="__('Ends at')" />
                        <x-text-input id="ends_at" name="ends_at" type="datetime-local" class="mt-1 block w-full" value="{{ $ends }}" required />
                        <x-input-error :messages="$errors->get('ends_at')" class="mt-2" />
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <input id="is_active" name="is_active" type="checkbox" value="1" class="rounded border-gray-300 text-brand-600 focus:ring-brand-500" {{ old('is_active', $offer->is_active) ? 'checked' : '' }} />
                    <x-input-label for="is_active" :value="__('Active')" class="!mb-0" />
                </div>
                <div class="flex items-center gap-2">
                    <input id="is_festival" name="is_festival" type="checkbox" value="1" class="rounded border-gray-300 text-brand-600 focus:ring-brand-500" x-model="festival" />
                    <x-input-label for="is_festival" :value="__('Festival / seasonal offer')" class="!mb-0" />
                </div>
                <div x-show="festival" x-cloak>
                    <x-input-label for="festival_name" :value="__('Festival name')" />
                    <x-text-input id="festival_name" name="festival_name" type="text" class="mt-1 block w-full" :value="old('festival_name', $offer->festival_name)" />
                    <x-input-error :messages="$errors->get('festival_name')" class="mt-2" />
                </div>
                <div class="flex gap-3">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                    <a href="{{ $offer->is_festival ? route('festival-offers.index') : route('offers.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
