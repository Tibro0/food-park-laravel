<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keys = ['chef_top_title', 'chef_main_title', 'chef_sub_title'];
        $chefTitles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        $chefs = Chef::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => [
                'chefTitles' => $chefTitles,
                'chefs' => $chefs
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
            'image' => 'required|image|max:2048|mimes:png',
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'fb' => 'nullable|max:255|url',
            'in' => 'nullable|max:255|url',
            'x' => 'nullable|max:255|url',
            'web' => 'nullable|max:255|url',
            'show_at_home' => 'required|boolean',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(200, 200);
            $img->toPng()->save(base_path('public/uploads/chefs_image/' . $name_gen));
            $save_url = 'uploads/chefs_image/' . $name_gen;

            $chef = new Chef();
            $chef->image = $save_url;
            $chef->name = $request->name;
            $chef->title = $request->title;
            $chef->fb = $request->fb;
            $chef->in = $request->in;
            $chef->x = $request->x;
            $chef->web = $request->web;
            $chef->show_at_home = $request->show_at_home;
            $chef->status = $request->status;
            $chef->save();

            return response()->json([
                'status' => 200,
                'message' => 'Created Successfully!'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chef = Chef::find($id);

        if ($chef == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Chef Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $chef
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
        $chef = Chef::find($id);

        if ($chef == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Chef Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:2048|mimes:png',
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'fb' => 'nullable|max:255|url',
            'in' => 'nullable|max:255|url',
            'x' => 'nullable|max:255|url',
            'web' => 'nullable|max:255|url',
            'show_at_home' => 'required|boolean',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $oldImage = $chef->image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(200, 200);
            $img->toPng()->save(base_path('public/uploads/chefs_image/' . $name_gen));
            $save_url = 'uploads/chefs_image/' . $name_gen;

            $chef->image = $save_url;
            $chef->name = $request->name;
            $chef->title = $request->title;
            $chef->fb = $request->fb;
            $chef->in = $request->in;
            $chef->x = $request->x;
            $chef->web = $request->web;
            $chef->show_at_home = $request->show_at_home;
            $chef->status = $request->status;
            $chef->save();

            $defaultImages = [
                'frontend/images/chef_1.jpg',
                'frontend/images/chef_2.jpg',
                'frontend/images/chef_3.jpg',
                'frontend/images/chef_4.jpg',
                'frontend/images/chef_5.jpg',
            ];

            if ($oldImage && !in_array($oldImage, $defaultImages) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        } else {
            $chef->name = $request->name;
            $chef->title = $request->title;
            $chef->fb = $request->fb;
            $chef->in = $request->in;
            $chef->x = $request->x;
            $chef->web = $request->web;
            $chef->show_at_home = $request->show_at_home;
            $chef->status = $request->status;
            $chef->save();

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chef = Chef::find($id);

        if ($chef == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Chef Not Found!',
            ], 404);
        }

        $defaultImages = [
            'frontend/images/chef_1.jpg',
            'frontend/images/chef_2.jpg',
            'frontend/images/chef_3.jpg',
            'frontend/images/chef_4.jpg',
            'frontend/images/chef_5.jpg',
        ];

        if ($chef->image && !in_array($chef->image, $defaultImages) && file_exists($chef->image)) {
            unlink($chef->image);
        }

        $chef->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }

    public function chefTitleUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'chef_top_title' => 'max:100',
            'chef_main_title' => 'max:200',
            'chef_sub_title' => 'max:500',
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
