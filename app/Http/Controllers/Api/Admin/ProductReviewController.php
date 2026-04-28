<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductReviewController extends Controller
{
    public function index()
    {
        $reviews = ProductRating::with(['product:id,name', 'user:id,name'])->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $reviews
        ], 200);
    }

    public function updateStatus(Request $request, string $id)
    {
        $review = ProductRating::find($id);

        if ($review == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Review Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $review->status = $request->status;
        $review->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function destroy(string $id)
    {
        $review = ProductRating::find($id);

        if ($review == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Review Not Found!'
            ], 404);
        }

        $review->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
