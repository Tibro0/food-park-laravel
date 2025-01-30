<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DeliveryArea;
use App\Models\Order;
use App\Models\ProductRating;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $deliveryAreas = DeliveryArea::where('status', 1)->get();
        $userAddresses = Address::With(['deliveryArea'])->where('user_id', Auth::user()->id)->get();
        $orders = Order::with(['userAddress'])->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $reviews = ProductRating::with(['user'])->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $wishlist = Wishlist::with(['product'])->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('frontend.dashboard.index', compact('deliveryAreas', 'userAddresses', 'orders', 'reviews',  'wishlist'));
    }
}
