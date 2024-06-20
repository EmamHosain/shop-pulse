<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishListController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;




// home route
Route::get('/', [HomeController::class, 'index'])->name('page.home');






// products start
Route::get('/product-details', [ProductController::class, 'getProductDetails'])->name('page.productDetails');
Route::get('/products-by-category/{slug}', [ProductController::class, 'getProductsByCategory'])->name('page.productsByCategory');
Route::get('/products-by-brand/{slug}', [ProductController::class, 'getProductsByBrand'])->name('page.productsByBrand');
// products end



// product wishlist route start here
Route::get('/wishlist', [WishListController::class, 'index'])->name('page.wishlist');
Route::post('/wishtlist', [WishListController::class, 'store'])->name('wishlist.store');
Route::delete('/wishtlist/{id}', [WishListController::class, 'delete'])->name('wishlist.delete');
// product wishlist route end here




// cart or checkout start here
Route::get('/checkout', [CheckoutController::class, 'index'])->name('page.checkout');
Route::post('/checkout', [CartItemController::class, 'store'])->name('checkout.store');
Route::put('/checkout/update', [CartItemController::class, 'update'])->name('checkout.update');
Route::delete('/checkout/delete/{id}', [CartItemController::class, 'delete'])->name('checkout.delete');
// cart or checkout end here









Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
