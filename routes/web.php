<?php

use App\Http\Controllers\Admin\AdminController;
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
// sorting products
Route::get('/products-by-category', [ProductController::class, 'getProductsByCategory'])->name('page.productsByCategory');
Route::get('/products-by-brand', [ProductController::class, 'getProductsByBrand'])->name('page.productsByBrand');
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

    // admin personal route start here
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/profile', [AdminController::class, 'updateProfile'])->name('page.updateAdminProfile');

    // admin personal route end here


    Route::get('/admin/dashboard-overview', [AdminController::class, 'dashboardOverview'])->name('page.dashboardOverview');
    // admin produc route start here
    Route::get('/admin/products', [App\Http\Controllers\Admin\ProductController::class, 'productView'])->name('page.productView');
    Route::get('/admin/create-product', [App\Http\Controllers\Admin\ProductController::class, 'createProduct'])->name('page.createProduct');
    Route::post('/admin/create-product', [App\Http\Controllers\Admin\ProductController::class, 'storeProduct'])->name('product.store');
    Route::get('/admin/update-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'getUpdateProductPage'])->name('page.updateProduct');
    Route::patch('/admin/update-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'updateProduct'])->name('product.update');
    Route::delete('/admin/delete-product/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteProduct'])->name('product.delete');
    // admin produc route end here




    // admin category route start here
    Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoryController::class, 'showAllCategories'])->name('page.categoryView');
    Route::get('/admin/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategoryPage'])
        ->name('page.updateCategory');
    Route::patch('/admin/update-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('category.update');
    Route::get('/admin/create-category', [App\Http\Controllers\Admin\CategoryController::class, 'createCategoryPage'])->name('page.createCategory');
    Route::post('/admin/create-category', [App\Http\Controllers\Admin\CategoryController::class, 'storeCategory'])->name('category.store');
    Route::delete('/admin/category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('category.delete');
    // admin category route end here



    // brand route start here
    Route::get('/admin/brands', [App\Http\Controllers\Admin\BrandController::class, 'showAllBrands'])->name('page.brandView');
    Route::get('/admin/create-brand', [App\Http\Controllers\Admin\BrandController::class, 'createBrand'])->name('page.createBrand');
    Route::post('/admin/create-brand', [App\Http\Controllers\Admin\BrandController::class, 'storeBrand'])->name('brand.store');
    Route::delete('/admin/brand-delete/{id}', [App\Http\Controllers\Admin\BrandController::class, 'deleteBrand'])->name('brand.delete');
    Route::get('/admin/update-brand/{id}', [App\Http\Controllers\Admin\BrandController::class, 'updateBrandPage'])->name('page.updateBrand');
    Route::patch('/admin/update-brand/{id}', [App\Http\Controllers\Admin\BrandController::class, 'updateBrand'])->name('brand.update');
    // brand route end here



    // category slider route start here
    Route::delete('/admin/category-slider-remove/{id}', [App\Http\Controllers\Admin\CategorySliderController::class, 'categorySliderRemove'])->name('category.categorySliderRemove');
    // category slider route end here
    // iamge route 
    Route::delete('/admin/remove-product-image/{productId}/{imageId}', [App\Http\Controllers\Admin\ProductImageController::class, 'removeProductImage'])->name('product.image.delete');


    // settings route start here
    Route::get('/admin/settings', [App\Http\Controllers\Admin\SettingsController::class, 'getSettingPage'])->name('page.settingsPage');
    // settings route end here


    // product unit route start here
    Route::post('/admin/product-unit', [App\Http\Controllers\Admin\ProductUnitController::class, 'storeProductUnit'])->name('productUnit.store');
    Route::patch('/admin/product-unit/update/{id}', [App\Http\Controllers\Admin\ProductUnitController::class, 'updateProductUnit'])->name('productUnit.update');
    Route::delete('/admin/product-unit/delete/{id}', [App\Http\Controllers\Admin\ProductUnitController::class, 'deleteProductUnit'])->name('productUnit.delete');


    // product unit route end here




});
