<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(){
        $addresses = Address::with(['deliveryArea'])->where(['user_id' => Auth::user()->id])->get();
        $deliveryAreas = DeliveryArea::where('status', 1)->get();
        return view('frontend.pages.checkout', compact('addresses', 'deliveryAreas'));
    }

    public function CalculateDeliveryCharge(string $id) {
        $address = Address::with(['deliveryArea'])->findOrFail($id);
        $deliveryFee = $address->deliveryArea?->delivery_fee;
        $grandTotal = grandCartTotal($deliveryFee);
        return response(['delivery_fee' => $deliveryFee, 'grand_total' => $grandTotal]);
    }

    public function checkoutRedirect(Request $request)  {
        $request->validate([
            'id' => ['required', 'integer']
        ]);

        $address = Address::with(['deliveryArea'])->findOrFail($request->id);
        $selectedAddress = $address->address.', Aria: '. $address->deliveryArea?->area_name;

        Session::put('address', $selectedAddress);
        Session::put('delivery_fee', $address->deliveryArea->delivery_fee);
        Session::put('address_id', $address->id);

        return response(['redirect_url' => route('payment.index')]);
    }
}
