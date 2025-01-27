<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SocialLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.social-link.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required'],
            'name' => ['required'],
            'link' => ['required',],
            'status' => ['required', 'boolean']
        ]);

        $link = new SocialLink();
        $link->icon = $request->icon;
        $link->name = $request->name;
        $link->link = $request->link;
        $link->status = $request->status;
        $link->save();

        toastr()->success('Created Successfully');
        return redirect()->route('admin.social-link.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $link = SocialLink::findOrFail($id);
        return view('admin.social-link.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required'],
            'name' => ['required'],
            'link' => ['required',],
            'status' => ['required', 'boolean']
        ]);

        $link = SocialLink::findOrFail($id);
        $link->icon = $request->icon;
        $link->name = $request->name;
        $link->link = $request->link;
        $link->status = $request->status;
        $link->save();

        toastr()->success('Update Successfully');
        return redirect()->route('admin.social-link.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link = SocialLink::findOrFail($id);
        $link->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
