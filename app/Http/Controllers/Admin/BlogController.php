<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCommentDataTable;
use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => ['required', 'image', 'max:3000'],
                'title' => ['required', 'max:255', 'unique:blogs,title'],
                'category' => ['required'],
                'description' => ['required'],
                'seo_title' => ['max:255'],
                'seo_description' => ['max:255'],
                'status' => ['required', 'boolean']
            ],
            [
                'category.required' => 'Please Select a Category'
            ]
        );

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(850, 450);
            $img->toJpeg(80)->save(base_path('public/uploads/blog_image/' . $name_gen));
            $save_url = 'uploads/blog_image/' . $name_gen;

            $blog = new Blog();
            $blog->user_id = Auth::user()->id;
            $blog->image = $save_url;
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category;
            $blog->description = $request->description;
            $blog->seo_title = $request->seo_title;
            $blog->seo_description = $request->seo_description;
            $blog->status = $request->status;
            $blog->save();

            toastr()->success('Created Successfully');
            return redirect()->route('admin.blogs.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'image' => ['nullable', 'image'],
                'title' => ['required', 'max:255', 'unique:blogs,title,' . $id],
                'category' => ['required'],
                'description' => ['required'],
                'seo_title' => ['max:255'],
                'seo_description' => ['max:255'],
                'status' => ['required', 'boolean']
            ],
            [
                'category.required' => 'Please Select a Category'
            ]
        );

        $oldImage = $request->old_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(850, 450);
            $img->toJpeg(80)->save(base_path('public/uploads/blog_image/' . $name_gen));
            $save_url = 'uploads/blog_image/' . $name_gen;

            $blog = Blog::findOrFail($id);
            $blog->image = $save_url;
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category;
            $blog->description = $request->description;
            $blog->seo_title = $request->seo_title;
            $blog->seo_description = $request->seo_description;
            $blog->status = $request->status;
            $blog->save();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully');
            return redirect()->route('admin.blogs.index');
        } else {
            $blog = Blog::findOrFail($id);
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category;
            $blog->description = $request->description;
            $blog->seo_title = $request->seo_title;
            $blog->seo_description = $request->seo_description;
            $blog->status = $request->status;
            $blog->save();

            toastr()->success('Updated Successfully');
            return redirect()->route('admin.blogs.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        unlink($blog->image);
        $blog->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

    public function blogComment(BlogCommentDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.blog-comment.index');
    }

    public function commentStatusUpdate(string $id)
    {
        $comment = BlogComment::findOrFail($id);

        $comment->status = !$comment->status;
        $comment->save();

        toastr()->success('Updated Successfully');
        return redirect()->back();
    }

    public function commentDestroy(string $id)
    {
        $comment = BlogComment::findOrFail($id);
        $comment->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
