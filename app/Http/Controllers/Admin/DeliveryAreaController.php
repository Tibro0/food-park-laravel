<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeliveryAreaDataTable;
use App\Http\Controllers\Controller;
use App\Models\DeliveryArea;
use Illuminate\Http\Request;

class DeliveryAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DeliveryAreaDataTable $dataTable)
    {
        return $dataTable->render('admin.delivery-area.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.delivery-area.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'area_name' => ['required', 'max:255'],
            'min_delivery_time' => ['required', 'max:255'],
            'max_delivery_time' => ['required', 'max:255'],
            'delivery_fee' => ['required', 'numeric'],
            'status' => ['required', 'boolean'],
        ]);

        $area = new DeliveryArea();
        $area->area_name = $request->area_name;
        $area->min_delivery_time = $request->min_delivery_time;
        $area->max_delivery_time = $request->max_delivery_time;
        $area->delivery_fee = $request->delivery_fee;
        $area->status = $request->status;
        $area->save();

        toastr()->success('Created Successfully!');
        return redirect()->route('admin.delivery-area.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $area = DeliveryArea::findOrFail($id);
        return view('admin.delivery-area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'area_name' => ['required', 'max:255'],
            'min_delivery_time' => ['required', 'max:255'],
            'max_delivery_time' => ['required', 'max:255'],
            'delivery_fee' => ['required', 'numeric'],
            'status' => ['required', 'boolean'],
        ]);

        $area = DeliveryArea::findOrFail($id);
        $area->area_name = $request->area_name;
        $area->min_delivery_time = $request->min_delivery_time;
        $area->max_delivery_time = $request->max_delivery_time;
        $area->delivery_fee = $request->delivery_fee;
        $area->status = $request->status;
        $area->save();

        toastr()->success('Updated Successfully!');
        return redirect()->route('admin.delivery-area.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $area = DeliveryArea::findOrFail($id);
        $area->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
