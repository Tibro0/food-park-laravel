<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        return response()->json([
            'status' => 200,
            'sliders' => $sliders
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
            'offer' => 'nullable|string|max:50',
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'short_description' => 'required|max:255',
            'button_link' => 'nullable|max:255',
            'status' => 'boolean'
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
            $img = $img->resize(450, 550);
            $img->toPng()->save(base_path('public/uploads/slider_image/' . $name_gen));
            $save_url = 'uploads/slider_image/' . $name_gen;

            $slider = new Slider();
            $slider->image = $save_url;
            $slider->offer = $request->offer;
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->short_description = $request->short_description;
            $slider->button_link = $request->button_link;
            $slider->status = $request->status;
            $slider->save();

            return response()->json([
                'status' => 200,
                'message' => 'Created Successfully!',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $slider = Slider::find($id);

        if ($slider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Slider Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'slider' => $slider,
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
        $slider = Slider::find($id);

        if ($slider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Slider Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|max:2048|mimes:png',
            'offer' => 'nullable|string|max:50',
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'short_description' => 'required|max:255',
            'button_link' => 'nullable|max:255',
            'status' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $oldImage = $slider->image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(450, 550);
            $img->toPng()->save(base_path('public/uploads/slider_image/' . $name_gen));
            $save_url = 'uploads/slider_image/' . $name_gen;


            $slider->image = $save_url;
            $slider->offer = $request->offer;
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->short_description = $request->short_description;
            $slider->button_link = $request->button_link;
            $slider->status = $request->status;
            $slider->save();

            $defaultImages = [
                'frontend/images/slider_img_1.png',
                'frontend/images/slider_img_2.png',
                'frontend/images/slider_img_3.png',
            ];

            if ($oldImage && !in_array($oldImage, $defaultImages) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!',
            ], 200);
        } else {
            $slider->offer = $request->offer;
            $slider->title = $request->title;
            $slider->sub_title = $request->sub_title;
            $slider->short_description = $request->short_description;
            $slider->button_link = $request->button_link;
            $slider->status = $request->status;
            $slider->save();

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);

        if ($slider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Slider Not Found!',
            ], 404);
        }

        $defaultImages = [
            'frontend/images/slider_img_1.png',
            'frontend/images/slider_img_2.png',
            'frontend/images/slider_img_3.png',
        ];

        if ($slider->image && !in_array($slider->image, $defaultImages) && file_exists($slider->image)) {
            unlink($slider->image);
        }

        $slider->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!',
        ], 200);
    }
}
