<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keys = ['why_choose_top_title', 'why_choose_main_title', 'why_choose_sub_title'];
        $whyChooseUsTitles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        $whyChooseUes = WhyChooseUs::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => [
                'whyChooseUsTitles' => $whyChooseUsTitles,
                'whyChooseUes' => $whyChooseUes
            ]
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
            'icon' => 'required|max:50',
            'title' => 'required|max:255',
            'short_description' => 'required|max:500',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $whyChooseUs = new WhyChooseUs();
        $whyChooseUs->icon = $request->icon;
        $whyChooseUs->title = $request->title;
        $whyChooseUs->short_description = $request->short_description;
        $whyChooseUs->status = $request->status;
        $whyChooseUs->save();

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
        $whyChooseUs = WhyChooseUs::find($id);

        if ($whyChooseUs == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Why Choose Us Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $whyChooseUs
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
        $whyChooseUs = WhyChooseUs::find($id);

        if ($whyChooseUs == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Why Choose Us Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'icon' => 'required|max:50',
            'title' => 'required|max:255',
            'short_description' => 'required|max:500',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $whyChooseUs->icon = $request->icon;
        $whyChooseUs->title = $request->title;
        $whyChooseUs->short_description = $request->short_description;
        $whyChooseUs->status = $request->status;
        $whyChooseUs->save();

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
        $whyChooseUs = WhyChooseUs::find($id);

        if ($whyChooseUs == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Why Choose Us Not Found!',
            ], 404);
        }

        $whyChooseUs->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }

    public function whyChooseTitleUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'why_choose_top_title' => 'max:100',
            'why_choose_main_title' => 'max:200',
            'why_choose_sub_title' => 'max:500',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $validatedData = $validator->validate();

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
