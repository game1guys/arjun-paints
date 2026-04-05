<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-semibold text-ink-900">{{ __('Add user') }}</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
            @include('admin.partials.flash')

            <form method="POST" action="{{ route('users.store') }}" class="space-y-6 rounded-lg bg-white p-6 shadow-sm sm:p-8">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm password')" />
                    <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required autocomplete="new-password" />
                </div>
                <div class="flex items-center gap-2">
                    <input id="is_admin" name="is_admin" type="checkbox" value="1" class="rounded border-gray-300 text-brand-600 focus:ring-brand-500" {{ old('is_admin') ? 'checked' : '' }} />
                    <x-input-label for="is_admin" :value="__('Administrator access')" class="!mb-0" />
                </div>
                <div class="flex gap-3">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                    <a href="{{ route('users.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
