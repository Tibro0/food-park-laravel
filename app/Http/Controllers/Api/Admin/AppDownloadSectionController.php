<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppDownloadSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AppDownloadSectionController extends Controller
{
    public function index()
    {
        $appSection = AppDownloadSection::first();
        return response()->json([
            'status' => 200,
            'data' => $appSection
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'nullable|image|max:2048|mimes:png',
            'title' => 'required|max:255',
            'short_description' => 'required|max:1000',
            'play_store_link' => 'nullable|url',
            'apple_store_link' => 'nullable|url'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $oldImage = AppDownloadSection::first()->image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(600, 700);
            $img->toPng(indexed: true)->save(base_path('public/uploads/app_download_image/' . $name_gen));
            $save_url = 'uploads/app_download_image/' . $name_gen;

            AppDownloadSection::updateOrCreate(
                ['id' => 1],
                [
                    'image' => $save_url,
                    'title' => $request->title,
                    'short_description' => $request->short_description,
                    'play_store_link' => $request->play_store_link,
                    'apple_store_link' => $request->apple_store_link
                ]
            );

            $defaultImages = [
                'frontend/images/download_img.png',
            ];

            if ($oldImage && !in_array($oldImage, $defaultImages) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        } else {
            AppDownloadSection::updateOrCreate(
                ['id' => 1],
                [
                    'title' => $request->title,
                    'short_description' => $request->short_description,
                    'play_store_link' => $request->play_store_link,
                    'apple_store_link' => $request->apple_store_link
                ]
            );

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        }
    }
}
