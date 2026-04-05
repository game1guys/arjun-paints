<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-display text-xl font-semibold text-ink-900">{{ __('Products') }}</h2>
            <a href="{{ route('products.create') }}" class="inline-flex justify-center rounded-lg bg-brand-700 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-800">{{ __('Add product') }}</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @include('admin.partials.flash')

            <form method="GET" action="{{ route('products.index') }}" class="mb-6 flex flex-wrap items-end gap-4 rounded-lg bg-white p-4 shadow-sm">
                <div>
                    <label for="brand_id" class="block text-xs font-medium text-gray-600">{{ __('Brand') }}</label>
                    <select id="brand_id" name="brand_id" class="mt-1 rounded-md border-gray-300 shadow-sm focus:border-brand-500 focus:ring-brand-500" onchange="this.form.submit()">
                        <option value="">{{ __('All brands') }}</option>
                        @foreach ($brands as $b)
                            <option value="{{ $b->id }}" @selected(request('brand_id') == $b->id)>{{ $b->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if (request('brand_id'))
                    <a href="{{ route('products.index') }}" class="text-sm text-brand-700 hover:underline">{{ __('Clear filter') }}</a>
                @endif
            </form>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Name') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Brand') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Price') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('SKU') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Active') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($products as $product)
                                <tr class="hover:bg-gray-50/80">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $product->name }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $product->brand->name }}</td>
                                    <td class="px-6 py-4 text-gray-600">
                                        @if ($product->price !== null)
                                            ₹{{ number_format((float) $product->price, 2) }}
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-gray-600">{{ $product->sku ?? '—' }}</td>
                                    <td class="px-6 py-4">{{ $product->is_active ? __('Yes') : __('No') }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('products.edit', $product) }}" class="text-brand-700 hover:underline">{{ __('Edit') }}</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Delete this product?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ms-3 text-red-600 hover:underline">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">{{ __('No products yet.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($products->hasPages())
                    <div class="border-t border-gray-100 px-6 py-4">{{ $products->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
