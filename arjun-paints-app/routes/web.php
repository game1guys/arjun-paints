<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/services', [SiteController::class, 'services'])->name('services');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/faq', [SiteController::class, 'faq'])->name('faq');
Route::get('/how-we-work', [SiteController::class, 'process'])->name('process');
Route::get('/catalog', [SiteController::class, 'catalog'])->name('catalog');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::post('/contact', [SiteController::class, 'contactSubmit'])
    ->middleware('throttle:10,1')
    ->name('contact.submit');

Route::middleware(['auth', 'verified', 'admin'])->prefix('dashboard')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('brands', BrandController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
    Route::resource('users', UserController::class)->except(['show']);

    Route::get('festival-offers', [OfferController::class, 'index'])->name('festival-offers.index');
    Route::get('offers', [OfferController::class, 'index'])->name('offers.index');
    Route::resource('offers', OfferController::class)->except(['index', 'show']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
