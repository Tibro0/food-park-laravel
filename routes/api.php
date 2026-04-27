<?php

use App\Http\Controllers\Api\Admin\AdminDashboardController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\DailyOfferController;
use App\Http\Controllers\Api\Admin\OrderController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\ProductGalleryController;
use App\Http\Controllers\Api\Admin\ProfileController;
use App\Http\Controllers\Api\Admin\SliderController;
use App\Http\Controllers\Api\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
});

/**
 * ------------------------------------------------------------------------------------------------------------
 * Admin All Routes Start
 * ------------------------------------------------------------------------------------------------------------
 *
 */

Route::group(['middleware' => ['auth:sanctum', 'apiRole:admin'], 'prefix' => 'admin'], function () {
    // Admin Logout Route
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
    });

    // Admin Dashboard Route
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('dashboard', 'index');
    });

    // Admin Profile Routes
    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'index');
        Route::post('profile', 'updateProfile');
        Route::post('profile/password', 'updatePassword');
    });

    // Admin Slider Routes
    Route::controller(SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::post('sliders', 'store');
        Route::get('sliders/{id}', 'show');
        Route::post('sliders/{id}', 'update');
        Route::delete('sliders/{id}', 'destroy');
    });

    // Daily Offer Routes
    Route::controller(DailyOfferController::class)->group(function () {
        Route::get('daily-offer', 'index');
        Route::get('daily-offer/product-search', 'productSearch');
        Route::post('daily-offer', 'store');
        Route::get('daily-offer/{id}', 'show');
        Route::put('daily-offer/{id}', 'update');
        Route::delete('daily-offer/{id}', 'destroy');
        Route::put('daily-offer-title', 'dailyOfferTitleUpdate');
    });

    // Admin Order Routes
    Route::controller(OrderController::class)->group(function () {
        Route::get('orders', 'index');
        Route::get('orders/pending', 'pendingOrderIndex');
        Route::get('orders/in-process', 'inProcessOrderIndex');
        Route::get('orders/delivered', 'deliveredOrderIndex');
        Route::get('orders/declined', 'declinedOrderIndex');
        Route::get('orders/{id}', 'show');
        Route::put('orders/status/{id}', 'orderStatusUpdate');
        Route::delete('orders/{id}', 'destroy');
    });

    // Admin Category Routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index');
        Route::post('categories', 'store');
        Route::get('categories/{id}', 'show');
        Route::put('categories/{id}', 'update');
        Route::delete('categories/{id}', 'destroy');
    });

    // Admin Product Routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('products', 'index');
        Route::post('products', 'store');
        Route::get('products/{id}', 'show');
        Route::post('products/{id}', 'update');
        Route::delete('products/{id}', 'destroy');
    });

    // Admin Product Gallery Routes
    Route::controller(ProductGalleryController::class)->group(function () {
        Route::get('products/gallery/{productId}', 'index');
        Route::post('products-gallery', 'store');
        Route::delete('products/gallery/{id}', 'destroy');
    });
});

/**
 * ------------------------------------------------------------------------------------------------------------
 * Admin All Routes End
 * ------------------------------------------------------------------------------------------------------------
 *
 */


/**
 * ------------------------------------------------------------------------------------------------------------
 * User All Routes Start
 * ------------------------------------------------------------------------------------------------------------
 *
 */

Route::group(['middleware' => ['auth:sanctum', 'apiRole:user'], 'prefix' => 'user'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout');
    });
});

/**
 * ------------------------------------------------------------------------------------------------------------
 * User All Routes End
 * ------------------------------------------------------------------------------------------------------------
 *
 */
