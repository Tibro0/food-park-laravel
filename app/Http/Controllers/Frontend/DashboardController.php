<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $deliveryAreas = DeliveryArea::where('status', 1)->get();
        $userAddresses = Address::With(['deliveryArea'])->where('user_id', Auth::user()->id)->get();
        return view('frontend.dashboard.index', compact('deliveryAreas', 'userAddresses'));
    }
}
