<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-xl font-semibold text-ink-900">{{ __('Edit product') }}</h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
            @include('admin.partials.flash')

            <form method="POST" action="{{ route('products.update', $product) }}" class="space-y-6 rounded-lg bg-white p-6 shadow-sm sm:p-8">
                @csrf
                @method('PUT')
                <div>
                    <x-input-label for="brand_id" :value="__('Brand')" />
                    <select id="brand_id" name="brand_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                        @foreach ($brands as $b)
                            <option value="{{ $b->id }}" @selected(old('brand_id', $product->brand_id) == $b->id)>{{ $b->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="name" :value="__('Product name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $product->name)" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="slug" :value="__('Slug')" />
                    <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $product->slug)" />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500">{{ old('description', $product->description) }}</textarea>
                </div>
                <div>
                    <x-input-label for="price" :value="__('Price (₹)')" />
                    <x-text-input id="price" name="price" type="number" step="0.01" min="0" class="mt-1 block w-full" :value="old('price', $product->price)" />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="sku" :value="__('SKU')" />
                    <x-text-input id="sku" name="sku" type="text" class="mt-1 block w-full" :value="old('sku', $product->sku)" />
                </div>
                <div class="flex items-center gap-2">
                    <input id="is_active" name="is_active" type="checkbox" value="1" class="rounded border-gray-300 text-brand-600 focus:ring-brand-500" {{ old('is_active', $product->is_active) ? 'checked' : '' }} />
                    <x-input-label for="is_active" :value="__('Active')" class="!mb-0" />
                </div>
                <div class="flex gap-3">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">{{ __('Cancel') }}</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
