<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\WhyChooseUsDataTable;
use App\Http\Controllers\Controller;
use App\Models\SectionTitle;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WhyChooseUsDataTable $dataTable)
    {
        $keys = ['why_choose_top_title', 'why_choose_main_title', 'why_choose_sub_title'];
        $titles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        return $dataTable->render('admin.why-choose-us.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.why-choose-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'max:50'],
            'title' => ['required', 'max:255'],
            'short_description' => ['required', 'max:500'],
            'status' => ['required', 'boolean'],
        ]);

        $whyChooseUs = new WhyChooseUs();
        $whyChooseUs->icon = $request->icon;
        $whyChooseUs->title = $request->title;
        $whyChooseUs->short_description = $request->short_description;
        $whyChooseUs->status = $request->status;
        $whyChooseUs->save();

        toastr()->success('Created Successfully');
        return redirect()->route('admin.why-choose-us.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        return view('admin.why-choose-us.edit', compact('whyChooseUs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'max:50'],
            'title' => ['required', 'max:255'],
            'short_description' => ['required', 'max:500'],
            'status' => ['required', 'boolean'],
        ]);

        $whyChooseUs = WhyChooseUs::findOrFail($id);
        $whyChooseUs->icon = $request->icon;
        $whyChooseUs->title = $request->title;
        $whyChooseUs->short_description = $request->short_description;
        $whyChooseUs->status = $request->status;
        $whyChooseUs->save();

        toastr()->success('Updated Successfully');
        return redirect()->route('admin.why-choose-us.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $whyChooseUs = WhyChooseUs::findOrFail($id);
        $whyChooseUs->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function updateTitle(Request $request)
    {
        $validatedData = $request->validate([
            'why_choose_top_title' => ['max:100'],
            'why_choose_main_title' => ['max:200'],
            'why_choose_sub_title' => ['max:500']
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
}
