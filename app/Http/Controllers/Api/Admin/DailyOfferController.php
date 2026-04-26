<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyOffer;
use App\Models\Product;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DailyOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keys = ['daily_offer_top_title', 'daily_offer_main_title', 'daily_offer_sub_title'];
        $dailyOfferTitles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        $dailyOffers = DailyOffer::with('product:id,name,thumb_image')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => [
                'dailyOfferTitles' => $dailyOfferTitles,
                'dailyOffers' => $dailyOffers
            ]
        ], 200);
    }

    public function productSearch(Request $request)
    {
        $product = Product::select('id', 'name', 'thumb_image')->where('name', 'LIKE', '%' . $request->search . '%')->get();

        return response()->json([
            'status' => 200,
            'data' => $product
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
            'product' => 'required|integer|unique:daily_offers,product_id',
            'status' => 'required|boolean'
        ],
        [
            'product.required' => 'Please Select a Product'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $offer = new DailyOffer();
        $offer->product_id = $request->product;
        $offer->status = $request->status;
        $offer->save();

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
        $offer = DailyOffer::with('product:id,name')->find($id);

        if ($offer === null) {
            return response()->json([
                'status' => 404,
                'message' => 'Daily Offer Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $offer
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
        $validator = Validator::make($request->all(), [
            'product' => 'required|integer|unique:daily_offers,product_id,' . $id,
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $offer = DailyOffer::find($id);

        if ($offer == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Daily Offer Not Found!'
            ], 404);
        }

        $offer->product_id = $request->product;
        $offer->status = $request->status;
        $offer->save();

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
        $dailyOffer = DailyOffer::find($id);

        if ($dailyOffer === null) {
            return response()->json([
                'status' => 404,
                'message' => 'Daily Offer Not Found!'
            ], 404);
        }

        $dailyOffer->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }

    public function dailyOfferTitleUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'daily_offer_top_title' => 'max:100',
            'daily_offer_main_title' => 'max:200',
            'daily_offer_sub_title' => 'max:500'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $validatedData = $validator->validated();

        foreach ($validatedData as $key => $value) {
            SectionTitle::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }
}
