<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class OfferController extends Controller
{
    public function index(Request $request): View
    {
        $festivalOnly = $request->routeIs('festival-offers.index');

        $offers = Offer::query()
            ->when($festivalOnly, fn ($q) => $q->where('is_festival', true))
            ->when(! $festivalOnly, fn ($q) => $q->where('is_festival', false))
            ->orderByDesc('starts_at')
            ->paginate(20);

        return view('admin.offers.index', compact('offers', 'festivalOnly'));
    }

    public function create(Request $request): View
    {
        $defaultFestival = $request->boolean('festival')
            || filter_var($request->old('is_festival', false), FILTER_VALIDATE_BOOLEAN);

        return view('admin.offers.create', compact('defaultFestival'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedOffer($request);
        Offer::query()->create($validated);

        return redirect()->route($validated['is_festival'] ? 'festival-offers.index' : 'offers.index')
            ->with('status', 'Offer created.');
    }

    public function edit(Offer $offer): View
    {
        return view('admin.offers.edit', compact('offer'));
    }

    public function update(Request $request, Offer $offer): RedirectResponse
    {
        $validated = $this->validatedOffer($request);
        $offer->update($validated);

        return redirect()->route($validated['is_festival'] ? 'festival-offers.index' : 'offers.index')
            ->with('status', 'Offer updated.');
    }

    public function destroy(Offer $offer): RedirectResponse
    {
        $wasFestival = $offer->is_festival;
        $offer->delete();

        return redirect()->route($wasFestival ? 'festival-offers.index' : 'offers.index')
            ->with('status', 'Offer removed.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedOffer(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:10000'],
            'discount_type' => ['required', 'in:percent,fixed'],
            'discount_value' => ['required', 'numeric', 'min:0'],
            'starts_at' => ['required', 'date'],
            'ends_at' => ['required', 'date', 'after:starts_at'],
            'is_active' => ['sometimes', 'boolean'],
            'is_festival' => ['sometimes', 'boolean'],
            'festival_name' => [
                'nullable',
                'string',
                'max:120',
                Rule::requiredIf(fn () => $request->boolean('is_festival')),
            ],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_festival'] = $request->boolean('is_festival');

        if (! $validated['is_festival']) {
            $validated['festival_name'] = null;
        }

        if ($validated['discount_type'] === 'percent' && $validated['discount_value'] > 100) {
            $validated['discount_value'] = 100;
        }

        return $validated;
    }
}
