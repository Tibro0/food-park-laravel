<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ChefDataTable;
use App\Http\Controllers\Controller;
use App\Models\Chef;
use App\Models\SectionTitle;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChefDataTable $dataTable)
    {
        $keys = ['chef_top_title', 'chef_main_title', 'chef_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $dataTable->render('admin.chef.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image'],
            'name' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'fb' => ['nullable', 'max:255', 'url'],
            'in' => ['nullable', 'max:255', 'url'],
            'x' => ['nullable', 'max:255', 'url'],
            'web' => ['nullable', 'max:255', 'url'],
            'show_at_home' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(200, 200);
            $img->toJpeg(80)->save(base_path('public/uploads/chefs_image/' . $name_gen));
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

            toastr()->success('Created Successfully!');
            return redirect()->route('admin.chefs.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chef = Chef::findOrFail($id);
        return view('admin.chef.edit', compact('chef'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image'],
            'name' => ['required', 'max:255'],
            'title' => ['required', 'max:255'],
            'fb' => ['nullable', 'max:255', 'url'],
            'in' => ['nullable', 'max:255', 'url'],
            'x' => ['nullable', 'max:255', 'url'],
            'web' => ['nullable', 'max:255', 'url'],
            'show_at_home' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ]);

        $oldImage = $request->old_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(200, 200);
            $img->toJpeg(80)->save(base_path('public/uploads/chefs_image/' . $name_gen));
            $save_url = 'uploads/chefs_image/' . $name_gen;

            $chef = Chef::findOrFail($id);
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

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Update Successfully!');
            return redirect()->route('admin.chefs.index');
        } else {
            $chef = Chef::findOrFail($id);
            $chef->name = $request->name;
            $chef->title = $request->title;
            $chef->fb = $request->fb;
            $chef->in = $request->in;
            $chef->x = $request->x;
            $chef->web = $request->web;
            $chef->show_at_home = $request->show_at_home;
            $chef->status = $request->status;
            $chef->save();

            toastr()->success('Update Successfully!');
            return redirect()->route('admin.chefs.index');
        }
    }

    public function updateTitle(Request $request)
    {
        $validatedData = $request->validate([
            'chef_top_title' => ['max:100'],
            'chef_main_title' => ['max:200'],
            'chef_sub_title' => ['max:500']
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
        $chef = Chef::findOrFail($id);
        unlink($chef->image);
        $chef->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
