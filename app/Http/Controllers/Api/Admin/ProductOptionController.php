<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductOptionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'product_id' => 'required|integer'
        ], [
            'name.required' => 'Product option name is required',
            'name.max' => 'Product option max length is 255',
            'price.required' => 'Product option price is required',
            'price.numeric' => 'Product option price have to be a number',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $option = new ProductOption();
        $option->product_id = $request->product_id;
        $option->name = $request->name;
        $option->price = $request->price;
        $option->save();

        return response()->json([
            'status' => 200,
            'message' => 'Created Successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $option = ProductOption::find($id);

        if ($option == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product Option Not Found!'
            ], 404);
        }

        $option->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
