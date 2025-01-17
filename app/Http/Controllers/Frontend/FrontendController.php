<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontendController extends Controller
{
    public function index(){
        $sectionTitles = $this->getSectionTitles();
        $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->get();
        $whyChooseUs = WhyChooseUs::where('status', 1)->orderBy('id', 'DESC')->get();
        $categories = Category::where(['show_at_home' => 1 ,'status' => 1])->orderBy('id', 'DESC')->get();
        return view('frontend.home.index', compact('sectionTitles', 'sliders', 'whyChooseUs', 'categories'));
    }

    public function getSectionTitles(){
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
        ];

        return SectionTitle::whereIn('key', $keys)->pluck('value','key');
    }

    public function showProduct(string $slug){
        $product = Product::with(['productImages', 'productSizes', 'productOptions'])->where(['slug' => $slug, 'status' => 1])->firstOrFail();
        $relatedProducts = Product::with(['category'])->where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(8)->latest()->get();;
        return view('frontend.pages.product-view', compact('product', 'relatedProducts'));
    }

    public function loadProductModal($productId){
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($productId);

        return view('frontend.layouts.ajax-files.product-popup-modal', compact('product'))->render();
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
}
