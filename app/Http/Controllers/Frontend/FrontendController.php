<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\AppDownloadSection;
use App\Models\BannerSlider;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Coupon;
use App\Models\DailyOffer;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Reservation;
use App\Models\ReservationTime;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\Testimonial;
use App\Models\TramsAndCondition;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class FrontendController extends Controller
{
    public function index(){
        $sectionTitles = $this->getSectionTitles();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->get();
        $whyChooseUs = WhyChooseUs::where('status', 1)->orderBy('id', 'DESC')->get();
        $categories = Category::where(['show_at_home' => 1 ,'status' => 1])->orderBy('id', 'DESC')->get();
        $dailyOffers = DailyOffer::with('product')->where('status', 1)->orderBy('id', 'DESC')->take(15)->get();
        $bannerSliders = BannerSlider::where('status', 1)->orderBy('id', 'DESC')->take(10)->get();
        $chefs = Chef::where(['show_at_home' => 1, 'status' => 1])->orderBy('id', 'DESC')->get();
        $appSection = AppDownloadSection::first();
        $testimonials = Testimonial::where(['show_at_home' => 1, 'status' => 1])->orderBy('id', 'DESC')->get();
        $counter = Counter::first();
        $latestBlogs = Blog::withCount(['comments' => function($query){
            $query->where('status', 1);
        }])->with(['category', 'user'])->where('status', 1)->orderby('id', 'DESC')->take(3)->get();
        return view('frontend.home.index', compact('sectionTitles', 'sliders', 'whyChooseUs', 'categories', 'dailyOffers', 'bannerSliders', 'chefs', 'appSection', 'testimonials', 'counter', 'latestBlogs'));
    }

    public function getSectionTitles(){
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'daily_offer_top_title',
            'daily_offer_main_title',
            'daily_offer_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];

        return SectionTitle::whereIn('key', $keys)->pluck('value','key');
    }

    public function chef(){
        $chefs = Chef::where(['status' => 1])->paginate(12);
        return view('frontend.pages.chefs', compact('chefs'));
    }

    public function testimonial(){
        $testimonials = Testimonial::where(['status' => 1])->paginate(9);
        return view('frontend.pages.testimonial', compact('testimonials'));
    }

    public function about(){
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];

        $sectionTitles = SectionTitle::whereIn('key', $keys)->pluck('value','key');;
        $about = About::first();
        $whyChooseUs = WhyChooseUs::where('status', 1)->get();
        $chefs = Chef::where(['show_at_home' => 1, 'status' => 1])->get();
        $counter = Counter::first();
        $testimonials = Testimonial::where(['show_at_home' => 1, 'status' => 1])->get();
        return view('frontend.pages.about', compact('sectionTitles', 'about', 'whyChooseUs', 'chefs', 'counter', 'testimonials'));
    }

    public function privacyPolicy(){
        $privacyPolicy = PrivacyPolicy::first();
        return view('frontend.pages.privacy-policy', compact('privacyPolicy'));
    }

    public function tramsAndConditions() {
        $tramsAndConditions = TramsAndCondition::first();
        return view('frontend.pages.trams-and-condition', compact('tramsAndConditions'));
    }

    public function contact(){
        $contact = Contact::first();
        return view('frontend.pages.contact', compact('contact'));
    }

    public function sendContactMessage(Request $request) {
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max: 1000']
        ]);

        Mail::send(new ContactMail($request->name, $request->email, $request->subject, $request->message));

        return response(['status' => 'success', 'message' => 'Message Sent Successfully!']);
    }

    public function products(Request $request){
        $products = Product::where(['status' => 1])->orderBy('id', 'DESC');

        if($request->has('search') && $request->filled('search')) {
            $products->where(function($query) use ($request) {
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('long_description', 'like', '%'.$request->search.'%');
            });
        }

        if($request->has('category') && $request->filled('category')) {
            $products->whereHas('category', function($query) use ($request){
                $query->where('slug', $request->category);
            });
        }

        $products = $products->withAvg('reviews', 'rating')->withCount('reviews')->paginate(12);

        $categories = Category::where('status', 1)->orderby('id', 'DESC')->get();
        return view('frontend.pages.product', compact('products', 'categories'));
    }

    public function showProduct(string $slug){
        $product = Product::with(['productImages', 'productSizes', 'productOptions', 'reviews'])->where(['slug' => $slug, 'status' => 1])->withAvg('reviews', 'rating')->withCount('reviews')->firstOrFail();

        $relatedProducts = Product::with(['category', 'reviews'])->where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(8)->withAvg('reviews', 'rating')->withCount('reviews')->latest()->get();

        $reviews = ProductRating::with(['user'])->where(['product_id' => $product->id, 'status' => 1])->paginate(30);
        return view('frontend.pages.product-view', compact('product', 'relatedProducts', 'reviews'));
    }

    public function loadProductModal($productId){
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($productId);

        return view('frontend.layouts.ajax-files.product-popup-modal', compact('product'))->render();
    }

    public function productReviewStore(Request $request){
        $request->validate([
            'rating' => ['required', 'min:1', 'max:5', 'integer'],
            'review' => ['required', 'max:500'],
            'product_id' => ['required', 'integer']
        ]);

        $user = Auth::user();

        $hasPurchased = $user->orders()->whereHas('orderItems', function($query) use ($request){
            $query->where('product_id', $request->product_id);
        })
        ->where('order_status', 'delivered')->get();

        if (count($hasPurchased) == 0) {
            throw ValidationException::withMessages(['Please Buy The Product Before Submit a Review!']);
        }

        $alreadyReviewed = ProductRating::where(['user_id' => $user->id, 'product_id' => $request->product_id])->exists();

        if ($alreadyReviewed) {
            throw ValidationException::withMessages(['You Already Reviewed this Product.']);
        }

        $review = new ProductRating();
        $review->user_id = $user->id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();

        toastr()->success('Review Added Successfully and Waiting to Approve');
        return redirect()->back();
    }

    public function applyCoupon(Request $request){
        $subtotal = $request->subtotal;
        $code = $request->code;

        $coupon = Coupon::where('code', $code)->first();

        if(!$coupon) {
            return response(['message' => 'Invalid Coupon Code.'], 422);
        }
        if($coupon->quantity <= 0){
            return response(['message' => 'Coupon has been Fully Redeemed.'], 422);
        }
        if($coupon->expire_date < now()){
            return response(['message' => 'Coupon has Expired.'], 422);
        }

        if($coupon->discount_type === 'percent') {
            $discount = number_format($subtotal * ($coupon->discount / 100), 2);
        }else if ($coupon->discount_type === 'amount'){
            $discount = number_format($coupon->discount, 2);
        }

        $finalTotal = $subtotal - $discount;

        Session::put('coupon', ['code' => $code, 'discount' => $discount]);

        return response(['message' => 'Coupon Applied Successfully.', 'discount' => $discount, 'finalTotal' => $finalTotal, 'coupon_code' => $code]);
    }

    public function destroyCoupon(){
        Session::forget('coupon');
        return response(['message' => 'Coupon Removed!', 'grand_cart_total' => grandCartTotal()]);
    }

    function reservation(Request $request) {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:50'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'persons' => ['required', 'numeric']
        ]);

        if(!Auth::check()){
            throw ValidationException::withMessages(['Please Login to Request Reservation']);
        }

        $reservation = new Reservation();
        $reservation->reservation_id = rand(0, 500000);
        $reservation->user_id = Auth::user()->id;
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->persons = $request->persons;
        $reservation->status = 'pending';
        $reservation->save();

        return response(['status' => 'success', 'message' => 'Request send successfully']);
    }

    public function subscribeNewsletter(Request $request){
        $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:subscribers,email']
        ], ['email.unique' => 'Email is already subscribed!']);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return response(['status' => 'success', 'message' => 'Subscribed Successfully!']);
    }
}
