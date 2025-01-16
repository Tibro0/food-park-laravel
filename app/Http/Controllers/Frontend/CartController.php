<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function index(){
        return view('frontend.pages.cart-view');
    }

    /** Add to Cart */
    public function addToCart(Request $request){
        // dd($request->all());
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($request->product_id);
        if($product->quantity < $request->quantity){
            throw ValidationException::withMessages(['Quantity is not Available!']);
        }
        $productSize = $product->productSizes->where('id', $request->product_size)->first();
        $productOptions = $product->productOptions->whereIn('id', $request->product_option);

        $options = [
            'product_size' => [],
            'product_options' => [],
            'product_info' => [
                    'image' => $product->thumb_image,
                    'slug' => $product->slug
            ]
        ];

        if ($productSize !== null) {
            $options['product_size'] = [
                'id' => $productSize?->id,
                'name' => $productSize?->name,
                'price' => $productSize?->price
            ];
        }

        foreach ($productOptions as $option) {
            $options['product_options'][] = [
                'id' => $option->id,
                'name' => $option->name,
                'price' => $option->price
            ];
        }

        Cart::add([
            'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
                'weight' => 0,
                'options' => $options
        ]);

        return response(['status' => 'success', 'message' => 'Product Added into Cart!'], 200);
    }

    public function getCartProduct(){
        return view('frontend.layouts.ajax-files.sidebar-cart-item')->render();
    }

    public function cartProductRemove($rowId){
        Cart::remove($rowId);
            return response([
                'status' => 'success',
                'message' => 'Item has been removed!',
        ], 200);
    }

    public function cartQtyUpdate(Request $request){
        $cartItem = Cart::get($request->rowId);
        $product = Product::findOrFail($cartItem->id);

        if($product->quantity < $request->qty){
           return response(['status' => 'error', 'message' => 'Quantity is not Available!', 'qty' => $cartItem->qty]);
        }

        $cart = Cart::update($request->rowId, $request->qty);

        return response(['product_total' => productTotal($request->rowId), 'qty' => $cart->qty],200);
    }

    public function cartDestroy(){
        Cart::destroy();

        return redirect()->back();
    }
}
