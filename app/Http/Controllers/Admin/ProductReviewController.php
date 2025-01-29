<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductRatingDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductRating;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function index(ProductRatingDataTable $dataTable){
        return $dataTable->render('admin.product.product-review.index');
    }

    public function updateStatus(Request $request){
        $review = ProductRating::findOrFail($request->id);
        $review->status = $request->status;
        $review->save();
        return response(['status' => 'success', 'message' => 'updated successfully!']);
    }

    public function destroy(string $id){
        $review = ProductRating::findOrFail($id);
        $review->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
