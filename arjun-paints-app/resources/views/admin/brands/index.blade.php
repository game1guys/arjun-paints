<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="font-display text-xl font-semibold text-ink-900">{{ __('Brands') }}</h2>
            <a href="{{ route('brands.create') }}" class="inline-flex justify-center rounded-lg bg-brand-700 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-800">{{ __('Add brand') }}</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @include('admin.partials.flash')

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Name') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Slug') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Active') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($brands as $brand)
                                <tr class="hover:bg-gray-50/80">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $brand->name }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ $brand->slug }}</td>
                                    <td class="px-6 py-4">{{ $brand->is_active ? __('Yes') : __('No') }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('brands.edit', $brand) }}" class="text-brand-700 hover:underline">{{ __('Edit') }}</a>
                                        <form action="{{ route('brands.destroy', $brand) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Delete this brand?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ms-3 text-red-600 hover:underline">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center text-gray-500">{{ __('No brands yet.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($brands->hasPages())
                    <div class="border-t border-gray-100 px-6 py-4">{{ $brands->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
