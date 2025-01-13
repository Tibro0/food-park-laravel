<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId)
    {
        $product = Product::findOrFail($productId);
        $sizes = ProductSize::where('product_id', $product->id)->get();
        $options = ProductOption::where('product_id', $product->id)->get();
        return view('admin.product.product-size.index', compact('product', 'sizes', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'product_id' => ['required', 'integer']
        ],[
            'name.required' => 'Product Size name is required',
            'name.max' => 'Product Size max length is 255',
            'price.required' => 'Product Size price is required',
            'price.numeric' => 'Product Size price have to be a number',
        ]);

        $size = new ProductSize();
        $size->product_id = $request->product_id;
        $size->name = $request->name;
        $size->price = $request->price;
        $size->save();

        toastr()->success('Created Successfully!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = ProductSize::findOrFail($id);
        $size->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
