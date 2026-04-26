<?php

use App\Http\Controllers\Api\Admin\AdminDashboardController;
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

    // Admin Slider Routes
    Route::controller(SliderController::class)->group(function () {
        Route::get('sliders', 'index');
        Route::post('sliders', 'store');
        Route::get('sliders/{id}', 'show');
        Route::post('sliders/{id}', 'update');
        Route::delete('sliders/{id}', 'destroy');
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
