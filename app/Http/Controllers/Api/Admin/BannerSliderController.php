<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\BannerSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BannerSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannerSliders = BannerSlider::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $bannerSliders
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
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'url' => 'required|url',
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
            $img = $img->resize(400, 250);
            $img->toPng()->save(base_path('public/uploads/banner_slider_image/' . $name_gen));
            $save_url = 'uploads/banner_slider_image/' . $name_gen;

            $bannerSlider = new BannerSlider();
            $bannerSlider->banner = $save_url;
            $bannerSlider->title = $request->title;
            $bannerSlider->sub_title = $request->sub_title;
            $bannerSlider->url = $request->url;
            $bannerSlider->status = $request->status;
            $bannerSlider->save();

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
        $bannerSlider = BannerSlider::find($id);

        if ($bannerSlider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Banner Slider Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $bannerSlider
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
        $bannerSlider = BannerSlider::find($id);

        if ($bannerSlider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Banner Slider Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|max:2048|mimes:png',
            'title' => 'required|max:255',
            'sub_title' => 'required|max:255',
            'url' => 'required|url',
            'status' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $oldImage = $bannerSlider->banner;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(400, 250);
            $img->toPng()->save(base_path('public/uploads/banner_slider_image/' . $name_gen));
            $save_url = 'uploads/banner_slider_image/' . $name_gen;

            $bannerSlider->banner = $save_url;
            $bannerSlider->title = $request->title;
            $bannerSlider->sub_title = $request->sub_title;
            $bannerSlider->url = $request->url;
            $bannerSlider->status = $request->status;
            $bannerSlider->save();

            $defaultImages = [
                'frontend/images/offer_slider_1.png',
                'frontend/images/offer_slider_2.png',
                'frontend/images/offer_slider_3.png',
                'frontend/images/offer_slider_4.png',
            ];

            if ($oldImage && !in_array($oldImage, $defaultImages) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        } else {
            $bannerSlider->title = $request->title;
            $bannerSlider->sub_title = $request->sub_title;
            $bannerSlider->url = $request->url;
            $bannerSlider->status = $request->status;
            $bannerSlider->save();

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
        $bannerSlider = BannerSlider::find($id);

        if ($bannerSlider == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Banner Slider Not Found!',
            ], 404);
        }

        $defaultImages = [
            'frontend/images/offer_slider_1.png',
            'frontend/images/offer_slider_2.png',
            'frontend/images/offer_slider_3.png',
            'frontend/images/offer_slider_4.png',
        ];

        if ($bannerSlider->banner && !in_array($bannerSlider->banner, $defaultImages) && file_exists($bannerSlider->banner)) {
            unlink($bannerSlider->banner);
        }

        $bannerSlider->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
