<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-display text-xl font-semibold text-ink-900">
                    {{ $festivalOnly ? __('Festival offers') : __('Offers') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    {{ $festivalOnly ? __('Seasonal / festival promotions') : __('Regular promotions and discounts') }}
                </p>
            </div>
            <a href="{{ route('offers.create', ['festival' => $festivalOnly ? 1 : 0]) }}" class="inline-flex justify-center rounded-lg bg-brand-700 px-4 py-2 text-sm font-semibold text-white hover:bg-brand-800">
                {{ $festivalOnly ? __('Add festival offer') : __('Add offer') }}
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @include('admin.partials.flash')

            <div class="mb-6 flex flex-wrap gap-3 text-sm">
                <a href="{{ route('offers.index') }}" class="rounded-full px-4 py-2 font-medium {{ ! $festivalOnly ? 'bg-brand-100 text-brand-900' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">{{ __('Regular offers') }}</a>
                <a href="{{ route('festival-offers.index') }}" class="rounded-full px-4 py-2 font-medium {{ $festivalOnly ? 'bg-brand-100 text-brand-900' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">{{ __('Festival offers') }}</a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Title') }}</th>
                                @if ($festivalOnly)
                                    <th class="px-6 py-3 font-medium text-gray-700">{{ __('Festival') }}</th>
                                @endif
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Discount') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Starts') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Ends') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Active') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($offers as $offer)
                                <tr class="hover:bg-gray-50/80">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $offer->title }}</td>
                                    @if ($festivalOnly)
                                        <td class="px-6 py-4 text-gray-600">{{ $offer->festival_name ?? '—' }}</td>
                                    @endif
                                    <td class="px-6 py-4 text-gray-600">
                                        @if ($offer->discount_type === 'percent')
                                            {{ rtrim(rtrim(number_format((float) $offer->discount_value, 2), '0'), '.') }}%
                                        @else
                                            ₹{{ number_format((float) $offer->discount_value, 2) }}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-gray-600">{{ $offer->starts_at->timezone(config('app.timezone'))->format('M j, Y H:i') }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-gray-600">{{ $offer->ends_at->timezone(config('app.timezone'))->format('M j, Y H:i') }}</td>
                                    <td class="px-6 py-4">{{ $offer->is_active ? __('Yes') : __('No') }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="{{ route('offers.edit', $offer) }}" class="text-brand-700 hover:underline">{{ __('Edit') }}</a>
                                        <form action="{{ route('offers.destroy', $offer) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Delete this offer?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ms-3 text-red-600 hover:underline">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ $festivalOnly ? 7 : 6 }}" class="px-6 py-12 text-center text-gray-500">{{ __('No offers yet.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($offers->hasPages())
                    <div class="border-t border-gray-100 px-6 py-4">{{ $offers->links() }}</div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
