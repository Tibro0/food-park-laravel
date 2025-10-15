<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BannerSliderDataTable;
use App\Http\Controllers\Controller;
use App\Models\BannerSlider;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BannerSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BannerSliderDataTable $dataTable)
    {
        return $dataTable->render('admin.banner-slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
            'url' => ['required', 'url'],
            'status' => ['required', 'boolean']
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(400, 250);
            $img->toJpeg(80)->save(base_path('public/uploads/banner_slider_image/' . $name_gen));
            $save_url = 'uploads/banner_slider_image/' . $name_gen;

            $bannerSlider = new BannerSlider();
            $bannerSlider->banner = $save_url;
            $bannerSlider->title = $request->title;
            $bannerSlider->sub_title = $request->sub_title;
            $bannerSlider->url = $request->url;
            $bannerSlider->status = $request->status;
            $bannerSlider->save();

            toastr()->success('Created Successfully!');
            return redirect()->route('admin.banner-slider.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bannerSlider = BannerSlider::findOrFail($id);
        return view('admin.banner-slider.edit', compact('bannerSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'max:255'],
            'sub_title' => ['required', 'max:255'],
            'url' => ['required', 'url'],
            'status' => ['required', 'boolean']
        ]);

        $oldImage = $request->old_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(400, 250);
            $img->toJpeg(80)->save(base_path('public/uploads/banner_slider_image/' . $name_gen));
            $save_url = 'uploads/banner_slider_image/' . $name_gen;

            $bannerSlider = BannerSlider::findOrFail($id);
            $bannerSlider->banner = $save_url;
            $bannerSlider->title = $request->title;
            $bannerSlider->sub_title = $request->sub_title;
            $bannerSlider->url = $request->url;
            $bannerSlider->status = $request->status;
            $bannerSlider->save();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully!');
            return redirect()->route('admin.banner-slider.index');
        } else {
            $bannerSlider = BannerSlider::findOrFail($id);
            $bannerSlider->title = $request->title;
            $bannerSlider->sub_title = $request->sub_title;
            $bannerSlider->url = $request->url;
            $bannerSlider->status = $request->status;
            $bannerSlider->save();

            toastr()->success('Updated Successfully!');
            return redirect()->route('admin.banner-slider.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bannerSlider = BannerSlider::findOrFail($id);
        unlink($bannerSlider->banner);
        $bannerSlider->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
