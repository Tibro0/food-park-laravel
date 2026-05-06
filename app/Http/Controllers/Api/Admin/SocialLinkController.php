<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $socialLinks
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
            'icon' => 'required|max:255',
            'name' => 'required|max:255',
            'link' => 'required|url',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $link = new SocialLink();
        $link->icon = $request->icon;
        $link->name = $request->name;
        $link->link = $request->link;
        $link->status = $request->status;
        $link->save();

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
        $link = SocialLink::find($id);

        if ($link == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Social Link Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $link
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
        $link = SocialLink::find($id);

        if ($link == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Social Link Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'icon' => 'required|max:255',
            'name' => 'required|max:255',
            'link' => 'required|url',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $link->icon = $request->icon;
        $link->name = $request->name;
        $link->link = $request->link;
        $link->status = $request->status;
        $link->save();

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
        $link = SocialLink::find($id);

        if ($link == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Social Link Not Found!',
            ], 404);
        }

        $link->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
