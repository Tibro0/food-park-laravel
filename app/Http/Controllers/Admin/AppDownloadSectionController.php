<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AppDownloadSection;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AppDownloadSectionController extends Controller
{
    public function index()
    {
        $appSection = AppDownloadSection::first();
        return view('admin.app-download-section.index', compact('appSection'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'max:255'],
            'short_description' => ['required', 'max:1000'],
            'play_store_link' => ['nullable', 'url'],
            'apple_store_link' => ['nullable', 'url'],
        ]);

        $oldImage = $request->old_image;
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

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully!');
            return redirect()->back();
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

            toastr()->success('Updated Successfully!');
            return redirect()->back();
        }
    }
}
