<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Frontend\AddressController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomPageController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\GithubLoginController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;

//////////////////////////////////
Route::get('tibro', function () {
    // return session()->flush();
    return session()->all();
});
/////////////////////////////////

/** Admin Auth Routes */
Route::group(['middleware' => 'guest'], function () {
    Route::controller(AdminAuthController::class)->group(function () {
        Route::get('admin/login', 'index')->name('admin.login');
        Route::get('admin/forget-password', 'forgetPassword')->name('admin.forget-password');
    });
});

Route::group(['middleware' => 'auth'], function () {
    /** User Dashboard Route */
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
        Route::get('user-dashboard-list-style', 'userDashboardListStyle')->name('user-dashboard-list-style');
    });

    /** User Profile Update Route */
    Route::controller(ProfileController::class)->group(function () {
        Route::put('profile', 'updateProfile')->name('profile.update');
        Route::put('profile/password', 'updatePassword')->name('profile.password.update');
        Route::post('profile/avatar', 'updateAvatar')->name('profile.avatar.update');
    });

    /** User Address Route */
    Route::controller(AddressController::class)->group(function () {
        Route::post('address', 'createAddress')->name('address.store');
        Route::put('address/{id}/edit', 'updateAddress')->name('address.update');
        Route::delete('address/{id}', 'destroyAddress')->name('address.destroy');
    });

    /** Checkout Route */
    Route::controller(CheckoutController::class)->group(function () {
        Route::get('checkout', 'index')->name('checkout.index');
        Route::get('checkout/{id}/delivery-cal', 'CalculateDeliveryCharge')->name('checkout.delivery-cal');
        Route::post('checkout', 'checkoutRedirect')->name('checkout.redirect');
    });

    /** Payment Routes */
    Route::controller(PaymentController::class)->group(function () {
        Route::get('payment', 'index')->name('payment.index');
        Route::post('make-payment', 'makePayment')->name('make-payment');

        Route::get('payment-success', 'paymentSuccess')->name('payment.success');
        Route::get('payment-cancel', 'paymentCancel')->name('payment.cancel');

        /** PayPal Routes */
        Route::get('paypal/payment', 'payWithPaypal')->name('paypal.payment');
        Route::get('paypal/success', 'paypalSuccess')->name('paypal.success');
        Route::get('paypal/cancel', 'paypalCancel')->name('paypal.cancel');

        /** Stripe Routes */
        Route::get('stripe/payment', 'payWithStripe')->name('stripe.payment');
        Route::get('stripe/success', 'stripeSuccess')->name('stripe.success');
        Route::get('stripe/cancel', 'stripeCancel')->name('stripe.cancel');

        /** Razorpay Routes */
        Route::get('razorpay-redirect', 'razorpayRedirect')->name('razorpay-redirect');
        Route::post('razorpay/payment', 'payWithRazorpay')->name('razorpay.payment');
    });
});


require __DIR__ . '/auth.php';


/** Home Route */
Route::get('/', [FrontendController::class, 'index'])->name('home');

/** Chef Route */
Route::get('chef', [FrontendController::class, 'chef'])->name('chef');

/** Testimonial Route */
Route::get('testimonials', [FrontendController::class, 'testimonial'])->name('testimonial');

/** Blogs Route */
Route::get('blogs', [BlogController::class, 'blog'])->name('blogs');
Route::get('blogs/{slug}', [BlogController::class, 'blogDetails'])->name('blogs.details');
Route::post('blogs/comment/{blog_id}', [BlogController::class, 'blogCommentStore'])->name('blogs.comment.store');

/** About Routes */
Route::get('about', [FrontendController::class, 'about'])->name('about');

/** Privacy Policy Routes */
Route::get('privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy.index');

/** Trams and Conditions Routes */
Route::get('trams-and-conditions', [FrontendController::class, 'tramsAndConditions'])->name('trams-and-conditions');

/** Contact Routes */
Route::get('contact', [FrontendController::class, 'contact'])->name('contact.index');
Route::post('contact', [FrontendController::class, 'sendContactMessage'])->name('contact.send-message');

/** Reservation Routes */
Route::post('reservation', [FrontendController::class, 'reservation'])->name('reservation.store');

/** Newsletter Routes */
Route::post('subscribe-newsletter', [FrontendController::class, 'subscribeNewsletter'])->name('subscribe-newsletter');

/** Custom Page Routes */
Route::get('page/{slug}', CustomPageController::class);

/** Product page Route*/
Route::get('products', [FrontendController::class, 'products'])->name('product.index');

/** Show Product Details Page */
Route::get('product/{slug}', [FrontendController::class, 'showProduct'])->name('product.show');

/** Product Modal Route */
Route::get('load-product-modal/{productId}', [FrontendController::class, 'loadProductModal'])->name('load-product-modal');
Route::post('product-review', [FrontendController::class, 'productReviewStore'])->name('product-review.store');

/** Add to Cart Route */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('get-cart-products', [CartController::class, 'getCartProduct'])->name('get-cart-products');
Route::get('cart-product-remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('cart-product-remove');

/** Wishlist Route */
Route::get('wishlist/{productId}', [WishlistController::class, 'store'])->name('wishlist.store');

/** Cart Page Route */
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart-update-qty', [CartController::class, 'cartQtyUpdate'])->name('cart.quantity-update');
Route::get('cart-destroy', [CartController::class, 'cartDestroy'])->name('cart.destroy');

/** Coupon Routes */
Route::post('apply-coupon', [FrontendController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('destroy-coupon', [FrontendController::class, 'destroyCoupon'])->name('destroy-coupon');

Route::controller(GithubLoginController::class)->group(function () {
    Route::get('/auth/github-redirect', 'githubLogin')->name('github.login');
    Route::get('/auth/github-callback', 'githubCallback')->name('github.callback');
});
