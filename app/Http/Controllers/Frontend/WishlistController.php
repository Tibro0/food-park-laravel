<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class WishlistController extends Controller
{
    public function store(string $productId){
        $productAlreadyExist = Wishlist::where(['user_id' => Auth::user()->id, 'product_id' => $productId])->exists();
        if($productAlreadyExist){
            throw ValidationException::withMessages(['Product is already add to wishlist ']);
        }
        if(!Auth::check()){
            throw ValidationException::withMessages(['Please login for add Product in Wishlist']);
        }

        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->product_id = $productId;
        $wishlist->save();

        return response(['status' => 'success', 'message' => 'Product added to wishlist!']);
    }
}
