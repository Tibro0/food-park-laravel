<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductSizeController extends Controller
{
    public function index(string $productId)
    {
        $product = Product::select('id', 'name')->find($productId);

        if ($product == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }

        $sizes = ProductSize::where('product_id', $product->id)->get();
        $options = ProductOption::where('product_id', $product->id)->get();
        return response()->json([
            'status' => 200,
            'data' => [
                'product' => $product,
                'sizes' => $sizes,
                'options' => $options
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'product_id' => 'required|integer'
        ], [
            'name.required' => 'Product Size name is required',
            'name.max' => 'Product Size max length is 255',
            'price.required' => 'Product Size price is required',
            'price.numeric' => 'Product Size price have to be a number',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $size = new ProductSize();
        $size->product_id = $request->product_id;
        $size->name = $request->name;
        $size->price = $request->price;
        $size->save();

        return response()->json([
            'status' => 201,
            'message' => 'Created Successfully!',
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = ProductSize::find($id);

        if ($size == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product Size Not Found!'
            ], 404);
        }

        $size->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
