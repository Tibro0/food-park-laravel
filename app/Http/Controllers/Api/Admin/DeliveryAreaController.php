<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DeliveryAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveryAreas = DeliveryArea::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $deliveryAreas
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
            'area_name' => 'required|max:255',
            'min_delivery_time' => 'required|max:255',
            'max_delivery_time' => 'required|max:255',
            'delivery_fee' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $area = new DeliveryArea();
        $area->area_name = $request->area_name;
        $area->min_delivery_time = $request->min_delivery_time;
        $area->max_delivery_time = $request->max_delivery_time;
        $area->delivery_fee = $request->delivery_fee;
        $area->status = $request->status;
        $area->save();

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
        $area = DeliveryArea::find($id);

        if ($area == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Delivery Area Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $area
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
        $area = DeliveryArea::find($id);

        if ($area == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Delivery Area Not Found!'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'area_name' => 'required|max:255',
            'min_delivery_time' => 'required|max:255',
            'max_delivery_time' => 'required|max:255',
            'delivery_fee' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $area->area_name = $request->area_name;
        $area->min_delivery_time = $request->min_delivery_time;
        $area->max_delivery_time = $request->max_delivery_time;
        $area->delivery_fee = $request->delivery_fee;
        $area->status = $request->status;
        $area->save();

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
        $area = DeliveryArea::find($id);

        if ($area == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Delivery Area Not Found!'
            ], 404);
        }

        $area->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
