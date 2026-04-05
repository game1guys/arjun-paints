<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $brands = Brand::query()->orderBy('name')->get();

        $products = Product::query()
            ->with('brand')
            ->when($request->filled('brand_id'), fn ($q) => $q->where('brand_id', $request->integer('brand_id')))
            ->orderBy('name')
            ->paginate(25)
            ->withQueryString();

        return view('admin.products.index', compact('products', 'brands'));
    }

    public function create(Request $request): View
    {
        $brands = Brand::query()->where('is_active', true)->orderBy('name')->get();
        $selectedBrandId = $request->integer('brand_id') ?: null;

        return view('admin.products.create', compact('brands', 'selectedBrandId'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedProduct($request);
        Product::query()->create($validated);

        return redirect()->route('products.index')->with('status', 'Product added.');
    }

    public function edit(Product $product): View
    {
        $brands = Brand::query()->orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'brands'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validatedProduct($request, $product);
        $product->update($validated);

        return redirect()->route('products.index')->with('status', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->with('status', 'Product removed.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedProduct(Request $request, ?Product $product = null): array
    {
        $productId = $product?->id;

        $validated = $request->validate([
            'brand_id' => ['required', 'exists:brands,id'],
            'name' => ['required', 'string', 'max:200'],
            'slug' => [
                'nullable',
                'string',
                'max:200',
                Rule::unique('products', 'slug')
                    ->where(fn ($q) => $q->where('brand_id', $request->integer('brand_id')))
                    ->ignore($productId),
            ],
            'description' => ['nullable', 'string', 'max:10000'],
            'price' => ['nullable', 'numeric', 'min:0', 'max:99999999.99'],
            'sku' => ['nullable', 'string', 'max:64'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $validated['slug'] = $validated['slug'] ?? Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');

        return $validated;
    }
}
