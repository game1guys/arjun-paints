<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-display text-xl font-semibold leading-tight text-ink-900">
                {{ __('Admin dashboard') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">{{ __('Overview and contact inquiries') }}</p>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-10 sm:px-6 lg:px-8">
            @include('admin.partials.flash')

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <a href="{{ route('dashboard') }}" class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm transition hover:border-brand-200 hover:shadow-md">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Inquiries') }}</p>
                    <p class="mt-2 font-display text-3xl font-bold text-brand-800">{{ $stats['inquiries'] }}</p>
                    <p class="mt-1 text-sm text-gray-600">{{ __('Contact form messages') }}</p>
                </a>
                <a href="{{ route('brands.index') }}" class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm transition hover:border-brand-200 hover:shadow-md">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Brands') }}</p>
                    <p class="mt-2 font-display text-3xl font-bold text-brand-800">{{ $stats['brands'] }}</p>
                    <p class="mt-1 text-sm text-gray-600">{{ __('Manage brands') }}</p>
                </a>
                <a href="{{ route('products.index') }}" class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm transition hover:border-brand-200 hover:shadow-md">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Products') }}</p>
                    <p class="mt-2 font-display text-3xl font-bold text-brand-800">{{ $stats['products'] }}</p>
                    <p class="mt-1 text-sm text-gray-600">{{ __('By brand') }}</p>
                </a>
                <a href="{{ route('users.index') }}" class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm transition hover:border-brand-200 hover:shadow-md">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Users') }}</p>
                    <p class="mt-2 font-display text-3xl font-bold text-brand-800">{{ $stats['users'] }}</p>
                    <p class="mt-1 text-sm text-gray-600">{{ __('User management') }}</p>
                </a>
                <a href="{{ route('offers.index') }}" class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm transition hover:border-brand-200 hover:shadow-md">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Offers') }}</p>
                    <p class="mt-2 font-display text-3xl font-bold text-brand-800">{{ $stats['offers'] }}</p>
                    <p class="mt-1 text-sm text-gray-600">{{ __('Regular promotions') }}</p>
                </a>
                <a href="{{ route('festival-offers.index') }}" class="rounded-xl border border-gray-100 bg-white p-5 shadow-sm transition hover:border-brand-200 hover:shadow-md">
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">{{ __('Festival offers') }}</p>
                    <p class="mt-2 font-display text-3xl font-bold text-brand-800">{{ $stats['festival_offers'] }}</p>
                    <p class="mt-1 text-sm text-gray-600">{{ __('Seasonal / festival') }}</p>
                </a>
            </div>

            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="font-display text-lg font-semibold text-gray-900">{{ __('Recent contact inquiries') }}</h3>
                    <p class="mt-1 text-sm text-gray-600">{{ __('From the public contact form') }}</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-left text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Date') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Name') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Email') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Phone') }}</th>
                                <th class="px-6 py-3 font-medium text-gray-700">{{ __('Message') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($inquiries as $row)
                                <tr class="hover:bg-gray-50/80">
                                    <td class="whitespace-nowrap px-6 py-4 text-gray-600">{{ $row->created_at->format('M j, Y H:i') }}</td>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $row->name }}</td>
                                    <td class="px-6 py-4"><a href="mailto:{{ $row->email }}" class="text-brand-700 hover:underline">{{ $row->email }}</a></td>
                                    <td class="px-6 py-4 text-gray-600">{{ $row->phone ?? '—' }}</td>
                                    <td class="max-w-md px-6 py-4 text-gray-700">{{ \Illuminate\Support\Str::limit($row->message, 160) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500">{{ __('No inquiries yet.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                @if ($inquiries->hasPages())
                    <div class="border-t border-gray-100 px-6 py-4">
                        {{ $inquiries->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
