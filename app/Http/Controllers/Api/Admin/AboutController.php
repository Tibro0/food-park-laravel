<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return response()->json([
            'status' => 200,
            'data' => $about
        ], 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|max:2024|mimes:png',
            'title' => 'required|max:255',
            'main_title' => 'required|max:255',
            'description' => 'required',
            'video_link' => 'required|url'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $oldImage = About::first()->image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(600, 400);
            $img->toPng(indexed: true)->save(base_path('public/uploads/about_page_image/' . $name_gen));
            $save_url = 'uploads/about_page_image/' . $name_gen;

            About::updateOrCreate(
                ['id' => 1],
                [
                    'image' => $save_url,
                    'title' => $request->title,
                    'main_title' => $request->main_title,
                    'description' => $request->description,
                    'video_link' => $request->video_link
                ]
            );

            $defaultImages = [
                'frontend/images/about_chef.jpg',
            ];

            if ($oldImage && !in_array($oldImage, $defaultImages) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        } else {
            About::updateOrCreate(
                ['id' => 1],
                [
                    'title' => $request->title,
                    'main_title' => $request->main_title,
                    'description' => $request->description,
                    'video_link' => $request->video_link
                ]
            );

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        }
    }
}
