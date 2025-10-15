<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TestimonialDataTable $dataTable)
    {
        $keys = ['testimonial_top_title', 'testimonial_main_title', 'testimonial_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $dataTable->render('admin.testimonial.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'rating' => ['required', 'integer', 'max:5'],
            'review' => ['required', 'max:1000'],
            'show_at_home' => ['required', 'boolean'],
            'status' => ['required', 'boolean']
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(100, 100);
            $img->toJpeg(80)->save(base_path('public/uploads/testimonial_image/' . $name_gen));
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

            toastr()->success('Created Successfully');
            return redirect()->route('admin.testimonial.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'rating' => ['required', 'integer', 'max:5'],
            'review' => ['required', 'max:1000'],
            'show_at_home' => ['required', 'boolean'],
            'status' => ['required', 'boolean']
        ]);

        $oldImage = $request->old_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(100, 100);
            $img->toJpeg(80)->save(base_path('public/uploads/testimonial_image/' . $name_gen));
            $save_url = 'uploads/testimonial_image/' . $name_gen;

            $testimonial = Testimonial::findOrFail($id);
            $testimonial->image = $save_url;
            $testimonial->name = $request->name;
            $testimonial->title = $request->title;
            $testimonial->rating = $request->rating;
            $testimonial->review = $request->review;
            $testimonial->show_at_home = $request->show_at_home;
            $testimonial->status = $request->status;
            $testimonial->save();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Created Successfully');
            return redirect()->route('admin.testimonial.index');
        } else {
            $testimonial = Testimonial::findOrFail($id);
            $testimonial->name = $request->name;
            $testimonial->title = $request->title;
            $testimonial->rating = $request->rating;
            $testimonial->review = $request->review;
            $testimonial->show_at_home = $request->show_at_home;
            $testimonial->status = $request->status;
            $testimonial->save();

            toastr()->success('Created Successfully');
            return redirect()->route('admin.testimonial.index');
        }
    }

    public function updateTitle(Request $request)
    {
        $validatedData = $request->validate([
            'testimonial_top_title' => ['max:100'],
            'testimonial_main_title' => ['max:200'],
            'testimonial_sub_title' => ['max:500']
        ]);
        foreach ($validatedData as $key => $value) {
            SectionTitle::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
        toastr()->success('Updated Successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        unlink($testimonial->image);
        $testimonial->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
