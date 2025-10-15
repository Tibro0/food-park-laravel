<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => ['nullable', 'image'],
            'title' => ['required', 'max:255'],
            'main_title' => ['required', 'max:255'],
            'description' => ['required'],
            'video_link' => ['required', 'url']
        ]);

        $oldImage = $request->old_image;
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

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully');
            return redirect()->back();
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

            toastr()->success('Updated Successfully');
            return redirect()->back();
        }
    }
}
