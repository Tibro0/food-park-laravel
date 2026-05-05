<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomPageBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CustomPageBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customPageBuilders = CustomPageBuilder::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $customPageBuilders
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
            'name' => 'required|max:200|unique:custom_page_builders,name',
            'content' => 'required',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $page = new CustomPageBuilder();
        $page->name = $request->name;
        $page->slug = Str::slug($request->name);
        $page->content = $request->content;
        $page->status = $request->status;
        $page->save();

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
        $page = CustomPageBuilder::find($id);

        if ($page == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Custom Page Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $page
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
        $page = CustomPageBuilder::find($id);

        if ($page == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Custom Page Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200|unique:custom_page_builders,name,' . $id,
            'content' => 'required',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $page->name = $request->name;
        $page->slug = Str::slug($request->name);
        $page->content = $request->content;
        $page->status = $request->status;
        $page->save();

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
        $page = CustomPageBuilder::find($id);

        if ($page == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Custom Page Not Found!',
            ], 404);
        }

        $page->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
