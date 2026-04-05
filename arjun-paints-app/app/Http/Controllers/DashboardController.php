<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ContactInquiry;
use App\Models\Offer;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            'inquiries' => ContactInquiry::query()->count(),
            'brands' => Brand::query()->count(),
            'products' => Product::query()->count(),
            'users' => User::query()->count(),
            'offers' => Offer::query()->where('is_festival', false)->count(),
            'festival_offers' => Offer::query()->where('is_festival', true)->count(),
        ];

        $inquiries = ContactInquiry::query()
            ->latest()
            ->paginate(15);

        return view('dashboard', compact('stats', 'inquiries'));
    }
}
