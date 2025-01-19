<?php
namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderService {

/** Store Order in Database  */
function createOrder() {
    $order = new Order();
        $order->invoice_id = generateInvoiceId();
        $order->user_id = Auth::user()->id;
        $order->address = Session::get('address');
        $order->discount = Session::get('coupon')['discount'] ?? 0;
        $order->delivery_charge = Session::get('delivery_fee');
        $order->subtotal = cartTotal();
        $order->grand_total = grandCartTotal(Session::get('delivery_fee'));
        $order->product_qty = Cart::content()->count();
        $order->payment_method = NULL;
        $order->payment_status = 'pending';
        $order->payment_approve_date = NULL;
        $order->transaction_id = NULL;
        $order->coupon_info = json_encode(Session::get('coupon'));
        $order->currency_name = NULL;
        $order->order_status = 'pending';
        $order->address_id = Session::get('address_id');
        $order->save();

        foreach(Cart::content() as $product) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_name = $product->name;
            $orderItem->product_id = $product->id;
            $orderItem->unit_price = $product->price;
            $orderItem->qty = $product->qty;
            $orderItem->product_size = json_encode($product->options->product_size);
            $orderItem->product_option = json_encode($product->options->product_options);
            $orderItem->save();
        }

        /** Putting the Order id in session */
        Session::put('order_id', $order->id);

        /** Putting the grand total amount in session */
        Session::put('grand_total', $order->grand_total);

        return true;
    }

    /** Clear Session Items  */
    function clearSession() {
        Cart::destroy();
        Session::forget('coupon');
        Session::forget('address');
        Session::forget('delivery_fee');
        Session::forget('address_id');
        Session::forget('order_id');
        Session::forget('grand_total');
    }
}
