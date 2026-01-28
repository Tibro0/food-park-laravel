<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\AppDownloadSectionController;
use App\Http\Controllers\Admin\BannerSliderController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomPageBuilderController;
use App\Http\Controllers\Admin\DailyOfferController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ReservationTimeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TramsAndConditionController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use Illuminate\Support\Facades\Route;


/** Admin Dashboard Route */
Route::controller(AdminDashboardController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

/** Profile Route */
Route::controller(ProfileController::class)->group(function () {
    Route::get('profile', 'index')->name('profile');
    Route::put('profile', 'updateProfile')->name('profile.update');
    Route::put('profile/password', 'updatePassword')->name('profile.password.update');
});

/** Slider Route */
Route::resource('slider', SliderController::class);

/** Why Choose Us Route */
Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title.update');
Route::resource('why-choose-us', WhyChooseUsController::class);

/** Product Category Route */
Route::resource('category', CategoryController::class);

/** Product Route */
Route::resource('product', ProductController::class);

/** Product Gallery Route */
Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
Route::resource('product-gallery', ProductGalleryController::class);

/** Product Size Routes */
Route::get('product-size/{product}', [ProductSizeController::class, 'index'])->name('product-size.show-index');
Route::resource('product-size', ProductSizeController::class);

/** Product Option Routes */
Route::resource('product-option', ProductOptionController::class);

/** Product Reviews Routes */
Route::controller(ProductReviewController::class)->group(function () {
    Route::get('product-reviews', 'index')->name('product-reviews.index');
    Route::post('product-reviews', 'updateStatus')->name('product-reviews.update');
    Route::delete('product-reviews/{id}', 'destroy')->name('product-reviews.destroy');
});

/** Coupon Routes */
Route::resource('coupon', CouponController::class);

/** Delivery Area Routes */
Route::resource('delivery-area', DeliveryAreaController::class);

/** Orders Routes */
Route::controller(OrderController::class)->group(function () {
    Route::get('orders', 'index')->name('orders.index');
    Route::get('orders/{id}', 'show')->name('orders.show');
    Route::delete('orders/{id}', 'destroy')->name('orders.destroy');

    Route::get('pending-orders', 'pendingOrderIndex')->name('pending-orders');
    Route::get('inprocess-orders', 'inProcessOrderIndex')->name('inprocess-orders');
    Route::get('delivered-orders', 'deliveredOrderIndex')->name('delivered-orders');
    Route::get('declined-orders', 'declinedOrderIndex')->name('declined-orders');

    Route::get('orders/status/{id}', 'getOrderStatus')->name('orders.status');
    Route::put('orders/status-update/{id}', 'orderStatusUpdate')->name('orders.status-update');
});

/** Daily Offer Routes */
Route::controller(DailyOfferController::class)->group(function () {
    Route::get('daily-offer/search-product', 'productSearch')->name('daily-offer.search-product');
    Route::put('daily-offer-title-update', 'updateTitle')->name('daily-offer-title-update');
});
Route::resource('daily-offer', DailyOfferController::class);

/** Banner Slider Routes */
Route::resource('banner-slider', BannerSliderController::class);

/** Chefs Routes */
Route::controller(ChefController::class)->group(function () {
    Route::put('chefs-title-update', 'updateTitle')->name('chefs-title-update');
});
Route::resource('chefs', ChefController::class);

/** App Download Routes */
Route::controller(AppDownloadSectionController::class)->group(function () {
    Route::get('app-download', 'index')->name('app-download.index');
    Route::post('app-download', 'store')->name('app-download.store');
});

/** Testimonial Routes */
Route::controller(TestimonialController::class)->group(function () {
    Route::put('testimonial-title-update', 'updateTitle')->name('testimonial-title-update');
});
Route::resource('testimonial', TestimonialController::class);

/** Counter Routes */
Route::controller(CounterController::class)->group(function () {
    Route::get('counter', 'index')->name('counter.index');
    Route::put('counter', 'update')->name('counter.update');
});

/** Blog Category Routes */
Route::resource('blog-category', BlogCategoryController::class);

/** Blog Comment */
Route::controller(BlogController::class)->group(function () {
    Route::get('blogs/comments', 'blogComment')->name('blogs.comments.index');
    Route::get('blogs/comments/{id}', 'commentStatusUpdate')->name('blogs.comments.update');
    Route::delete('blogs/comments/{id}', 'commentDestroy')->name('blogs.comments.destroy');
});

/** Blogs Routes */
Route::resource('blogs', BlogController::class);

/** About Routes */
Route::controller(AboutController::class)->group(function () {
    Route::get('about', 'index')->name('about.index');
    Route::put('about', 'update')->name('about.update');
});

/** Privacy Policy Routes */
Route::controller(PrivacyPolicyController::class)->group(function () {
    Route::get('privacy-policy', 'index')->name('privacy-policy.index');
    Route::put('privacy-policy', 'update')->name('privacy-policy.update');
});

/** Contact Routes */
Route::controller(ContactController::class)->group(function () {
    Route::get('contact', 'index')->name('contact.index');
    Route::put('contact', 'update')->name('contact.update');
});

/** Reservation Routes */
Route::resource('reservation-time', ReservationTimeController::class);
Route::controller(ReservationController::class)->group(function () {
    Route::get('reservation', 'index')->name('reservation.index');
    Route::post('reservation', 'update')->name('reservation.update');
    Route::delete('reservation/{id}', 'destroy')->name('reservation.destroy');
});

/** News letter Routes */
Route::controller(NewsLetterController::class)->group(function () {
    Route::get('news-letter', 'index')->name('news-letter.index');
    Route::post('news-letter', 'sendNewsLetter')->name('news-letter.send');
});

/** Social Links Routes */
Route::resource('social-link', SocialLinkController::class);

/** Footer info Routes */
Route::controller(FooterInfoController::class)->group(function () {
    Route::get('footer-info', 'index')->name('footer-info.index');
    Route::put('footer-info', 'update')->name('footer-info.update');
});

/** Custom page builder Routes */
Route::resource('custom-page-builder', CustomPageBuilderController::class);

/** Admin management Routes */
Route::resource('admin-management', AdminManagementController::class);

/** Trams And Conditions Routes */
Route::controller(TramsAndConditionController::class)->group(function () {
    Route::get('trams-and-conditions', 'index')->name('trams-and-conditions.index');
    Route::put('trams-and-conditions', 'update')->name('trams-and-conditions.update');
});

/** Payment Gateway Routes */
Route::controller(PaymentGatewaySettingController::class)->group(function () {
    Route::get('payment-gateway-setting', 'index')->name('payment-setting.index');
    Route::put('paypal-setting', 'paypalSettingUpdate')->name('paypal-setting.update');
    Route::put('stripe-setting', 'stripeSettingUpdate')->name('stripe-setting.update');
    Route::put('razorpay-setting', 'razorpaySettingUpdate')->name('razorpay-setting.update');
    Route::get('payment-gateway-list-style', 'paymentGatewayListStyle')->name('payment-gateway-list-style');
});

/** Setting Routes */
Route::controller(SettingController::class)->group(function () {
    Route::get('setting', 'index')->name('setting.index');
    Route::put('general-setting', 'updateGeneralSetting')->name('general-setting.update');
    Route::put('mail-setting', 'UpdateMailSetting')->name('mail-setting.update');
    Route::put('logo-setting', 'UpdateLogoSetting')->name('logo-setting.update');
    Route::put('appearance-setting', 'UpdateAppearanceSetting')->name('appearance-setting.update');
    Route::put('seo-setting', 'UpdateSeoSetting')->name('seo-setting.update');

    Route::put('github-setting', 'updateGithubSetting')->name('github-setting.update');


    Route::get('setting-list-style', 'adminSettingListStyle')->name('setting-list-style');
});
