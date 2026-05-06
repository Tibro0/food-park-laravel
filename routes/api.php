<?php

use App\Http\Controllers\Api\Admin\AboutController;
use App\Http\Controllers\Api\Admin\AdminDashboardController;
use App\Http\Controllers\Api\Admin\AppDownloadSectionController;
use App\Http\Controllers\Api\Admin\BannerSliderController;
use App\Http\Controllers\Api\Admin\BlogCategoryController;
use App\Http\Controllers\Api\Admin\BlogCommentController;
use App\Http\Controllers\Api\Admin\BlogController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\ChefController;
use App\Http\Controllers\Api\Admin\ContactController;
use App\Http\Controllers\Api\Admin\CounterController;
use App\Http\Controllers\Api\Admin\CouponController;
use App\Http\Controllers\Api\Admin\CustomPageBuilderController;
use App\Http\Controllers\Api\Admin\DailyOfferController;
use App\Http\Controllers\Api\Admin\DeliveryAreaController;
use App\Http\Controllers\Api\Admin\NewsLetterController;
use App\Http\Controllers\Api\Admin\OrderController;
use App\Http\Controllers\Api\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Api\Admin\PrivacyPolicyController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\ProductGalleryController;
use App\Http\Controllers\Api\Admin\ProductOptionController;
use App\Http\Controllers\Api\Admin\ProductReviewController;
use App\Http\Controllers\Api\Admin\ProductSizeController;
use App\Http\Controllers\Api\Admin\ProfileController;
use App\Http\Controllers\Api\Admin\ReservationController;
use App\Http\Controllers\Api\Admin\ReservationTimeController;
use App\Http\Controllers\Api\Admin\SliderController;
use App\Http\Controllers\Api\Admin\TestimonialController;
use App\Http\Controllers\Api\Admin\TramsAndConditionController;
use App\Http\Controllers\Api\Admin\WhyChooseUsController;
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

    // Admin Product Size Routes
    Route::controller(ProductSizeController::class)->group(function () {
        Route::get('products/sizes/{productId}', 'index');
        Route::post('products-sizes', 'store');
        Route::delete('products/sizes/{id}', 'destroy');
    });

    // Admin Product Option Routes
    Route::controller(ProductOptionController::class)->group(function () {
        Route::post('products-options', 'store');
        Route::delete('products/options/{id}', 'destroy');
    });

    // Product Review Routes
    Route::controller(ProductReviewController::class)->group(function () {
        Route::get('product-reviews', 'index');
        Route::post('product-reviews-status/{id}', 'updateStatus');
        Route::delete('product-reviews/{id}', 'destroy');
    });

    // Coupon Routes
    Route::controller(CouponController::class)->group(function () {
        Route::get('coupons', 'index');
        Route::post('coupons', 'store');
        Route::get('coupons/{id}', 'show');
        Route::put('coupons/{id}', 'update');
        Route::delete('coupons/{id}', 'destroy');
    });

    // Delivery Area Routes
    Route::controller(DeliveryAreaController::class)->group(function () {
        Route::get('delivery-areas', 'index');
        Route::post('delivery-areas', 'store');
        Route::get('delivery-areas/{id}', 'show');
        Route::put('delivery-areas/{id}', 'update');
        Route::delete('delivery-areas/{id}', 'destroy');
    });

    // Payment Gateway Setting Routes
    Route::controller(PaymentGatewaySettingController::class)->group(function () {
        Route::get('payment-gateway-setting', 'index');
        Route::post('payment-gateway-setting/paypal', 'paypalSettingUpdate');
        Route::post('payment-gateway-setting/stripe', 'stripeSettingUpdate');
        Route::post('payment-gateway-setting/razorpay', 'razorpaySettingUpdate');
    });

    // Reservation Time Routes
    Route::controller(ReservationTimeController::class)->group(function () {
        Route::get('reservation-times', 'index');
        Route::post('reservation-times', 'store');
        Route::get('reservation-times/{id}', 'show');
        Route::put('reservation-times/{id}', 'update');
        Route::delete('reservation-times/{id}', 'destroy');
    });

    // Reservation Routes
    Route::controller(ReservationController::class)->group(function () {
        Route::get('reservations', 'index');
        Route::put('reservations/{id}', 'update');
        Route::delete('reservations/{id}', 'destroy');
    });

    // Blog Category Routes
    Route::controller(BlogCategoryController::class)->group(function () {
        Route::get('blog-categories', 'index');
        Route::post('blog-categories', 'store');
        Route::get('blog-categories/{id}', 'show');
        Route::put('blog-categories/{id}', 'update');
        Route::delete('blog-categories/{id}', 'destroy');
    });

    // Blog Routes
    Route::controller(BlogController::class)->group(function () {
        Route::get('blog', 'index');
        Route::post('blog', 'store');
        Route::get('blog/{id}', 'show');
        Route::post('blog/{id}', 'update');
        Route::delete('blog/{id}', 'destroy');
    });

    // Blog Comment Routes
    Route::controller(BlogCommentController::class)->group(function () {
        Route::get('blogs/comments', 'index');
        Route::put('blogs/comments/status-change/{id}', 'statusChange');
        Route::delete('blogs/comments/{id}', 'destroy');
    });

    // Why Choose Us Routes
    Route::controller(WhyChooseUsController::class)->group(function () {
        Route::get('why-choose-us', 'index');
        Route::post('why-choose-us', 'store');
        Route::get('why-choose-us/{id}', 'show');
        Route::put('why-choose-us/{id}', 'update');
        Route::delete('why-choose-us/{id}', 'destroy');
        Route::put('why-choose-title-update', 'whyChooseTitleUpdate');
    });

    // Banner Slider Routes
    Route::controller(BannerSliderController::class)->group(function () {
        Route::get('banner-slider', 'index');
        Route::post('banner-slider', 'store');
        Route::get('banner-slider/{id}', 'show');
        Route::post('banner-slider/{id}', 'update');
        Route::delete('banner-slider/{id}', 'destroy');
    });

    // Chef Routes
    Route::controller(ChefController::class)->group(function () {
        Route::get('chefs', 'index');
        Route::post('chefs', 'store');
        Route::get('chefs/{id}', 'show');
        Route::post('chefs/{id}', 'update');
        Route::delete('chefs/{id}', 'destroy');
        Route::put('chef-title-update', 'chefTitleUpdate');
    });

    // App Download Routes
    Route::controller(AppDownloadSectionController::class)->group(function () {
        Route::get('app-download', 'index');
        Route::post('app-download', 'store');
    });

    // Testimonial Routes
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('testimonials', 'index');
        Route::post('testimonials', 'store');
        Route::get('testimonials/{id}', 'show');
        Route::post('testimonials/{id}', 'update');
        Route::delete('testimonials/{id}', 'destroy');
        Route::put('testimonial-title-update', 'testimonialTitleUpdate');
    });

    // Counter Routes
    Route::controller(CounterController::class)->group(function () {
        Route::get('counter', 'index');
        Route::post('counter', 'update');
    });

    // Custom Page Builder Routes
    Route::controller(CustomPageBuilderController::class)->group(function () {
        Route::get('custom-page-builder', 'index');
        Route::post('custom-page-builder', 'store');
        Route::get('custom-page-builder/{id}', 'show');
        Route::put('custom-page-builder/{id}', 'update');
        Route::delete('custom-page-builder/{id}', 'destroy');
    });

    // About Routes
    Route::controller(AboutController::class)->group(function () {
        Route::get('about', 'index');
        Route::post('about', 'update');
    });

    // Privacy Policy Routes
    Route::controller(PrivacyPolicyController::class)->group(function () {
        Route::get('privacy-policy', 'index');
        Route::put('privacy-policy', 'update');
    });

    // Trams And Conditions Routes
    Route::controller(TramsAndConditionController::class)->group(function () {
        Route::get('trams-and-conditions', 'index');
        Route::put('trams-and-conditions', 'update');
    });

    // Contact Routes
    Route::controller(ContactController::class)->group(function () {
        Route::get('contact', 'index');
        Route::put('contact', 'update');
    });

    // News letter Routes
    Route::controller(NewsLetterController::class)->group(function () {
        Route::get('news-letter', 'index');
        Route::post('news-letter', 'sendNewsLetter');
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
