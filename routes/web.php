<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishListController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;





Route::get('/', [HomeController::class, 'index'])->name('page.home');
Route::get('/product-by-category', [HomeController::class, 'getProductsByCategory'])->name('page.productsByCategory');
Route::get('/product-details', [ProductController::class, 'index'])->name('page.productDetails');
Route::get('/wishlist', [WishListController::class, 'index'])->name('page.wishlist');
Route::get('/checkout',[CheckoutController::class,'index'])->name('page.checkout');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');
    });


Route::get('/home-page', [HomeController::class, 'homeOne'])->name('home-1');