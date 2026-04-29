<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $coupons
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'code' => 'required|max:50',
            'quantity' => 'required|integer',
            'min_purchase_amount' => 'required|integer',
            'expire_date' => 'required|date',
            'discount_type' => 'required|in:percent,amount',
            'discount' => 'required',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->min_purchase_amount = $request->min_purchase_amount;
        $coupon->expire_date = $request->expire_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->status = $request->status;
        $coupon->save();

        return response()->json([
            'status' => 200,
            'message' => 'Created Successfully!'
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coupon = Coupon::find($id);

        if ($coupon == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Coupon Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $coupon
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coupon = Coupon::find($id);

        if ($coupon == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Coupon Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'code' => 'required|max:50',
            'quantity' => 'required|integer',
            'min_purchase_amount' => 'required|integer',
            'expire_date' => 'required|date',
            'discount_type' => 'required|in:percent,amount',
            'discount' => 'required',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->min_purchase_amount = $request->min_purchase_amount;
        $coupon->expire_date = $request->expire_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->status = $request->status;
        $coupon->save();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::find($id);

        if ($coupon == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Coupon Not Found!'
            ], 404);
        }

        $coupon->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
