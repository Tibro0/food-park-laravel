<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keys = ['testimonial_top_title', 'testimonial_main_title', 'testimonial_sub_title'];
        $testimonialTitles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => [
                'testimonialTitles' => $testimonialTitles,
                'testimonials' => $testimonials
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
            'rating' => 'required|integer|max:5',
            'review' => 'required|max:1000',
            'show_at_home' => 'required|boolean',
            'status' => 'required|boolean',
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
            $img = $img->resize(100, 100);
            $img->toPng()->save(base_path('public/uploads/testimonial_image/' . $name_gen));
            $save_url = 'uploads/testimonial_image/' . $name_gen;

            $testimonial = new Testimonial();
            $testimonial->image = $save_url;
            $testimonial->name = $request->name;
            $testimonial->title = $request->title;
            $testimonial->rating = $request->rating;
            $testimonial->review = $request->review;
            $testimonial->show_at_home = $request->show_at_home;
            $testimonial->status = $request->status;
            $testimonial->save();

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
        $testimonial = Testimonial::find($id);

        if ($testimonial == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Testimonial Not Found!',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $testimonial
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
        $testimonial = Testimonial::find($id);

        if ($testimonial == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Testimonial Not Found!',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|max:2048|mimes:png',
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'rating' => 'required|integer|max:5',
            'review' => 'required|max:1000',
            'show_at_home' => 'required|boolean',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $oldImage = $testimonial->image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(100, 100);
            $img->toPng()->save(base_path('public/uploads/testimonial_image/' . $name_gen));
            $save_url = 'uploads/testimonial_image/' . $name_gen;

            $testimonial->image = $save_url;
            $testimonial->name = $request->name;
            $testimonial->title = $request->title;
            $testimonial->rating = $request->rating;
            $testimonial->review = $request->review;
            $testimonial->show_at_home = $request->show_at_home;
            $testimonial->status = $request->status;
            $testimonial->save();

            $defaultImages = [
                'frontend/images/comment_img_1.png',
                'frontend/images/comment_img_2.png',
                'frontend/images/client_img_1.jpg',
                'frontend/images/client_img_3.jpg',
            ];

            if ($oldImage && !in_array($oldImage, $defaultImages) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        } else {
            $testimonial->name = $request->name;
            $testimonial->title = $request->title;
            $testimonial->rating = $request->rating;
            $testimonial->review = $request->review;
            $testimonial->show_at_home = $request->show_at_home;
            $testimonial->status = $request->status;
            $testimonial->save();

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
        $testimonial = Testimonial::find($id);

        if ($testimonial == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Testimonial Not Found!',
            ], 404);
        }

        $defaultImages = [
            'frontend/images/comment_img_1.png',
            'frontend/images/comment_img_2.png',
            'frontend/images/client_img_1.jpg',
            'frontend/images/client_img_3.jpg',
        ];

        if ($testimonial->image && !in_array($testimonial->image, $defaultImages) && file_exists($testimonial->image)) {
            unlink($testimonial->image);
        }

        $testimonial->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }

    public function testimonialTitleUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'testimonial_top_title' => 'max:100',
            'testimonial_main_title' => 'max:200',
            'testimonial_sub_title' => 'max:500'
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
            'message' => 'Updated Successfully!',
        ], 200);
    }
}
