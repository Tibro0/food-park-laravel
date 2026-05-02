<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('category:id,name')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $blogs
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'required|image|max:2048|mimes:png',
                'title' => 'required|max:255|unique:blogs,title',
                'category' => 'required|integer',
                'description' => 'required',
                'seo_title' => 'nullable|max:255',
                'seo_description' => 'nullable|max:255',
                'status' => 'required|boolean',
            ],
            [
                'category.required' => 'Please Select a Category'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(850, 450);
            $img->toPng()->save(base_path('public/uploads/blog_image/' . $name_gen));
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

            return response()->json([
                'status' => 200,
                'message' => 'Created Successfully!'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::with('category:id,name')->find($id);

        if ($blog == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $blog
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::with('category:id,name')->find($id);

        if ($blog == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Not Found!'
            ], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'nullable|image|max:2048|mimes:png',
                'title' => 'required|max:255|unique:blogs,title,' . $id,
                'category' => 'required|integer',
                'description' => 'required',
                'seo_title' => 'nullable|max:255',
                'seo_description' => 'nullable|max:255',
                'status' => 'required|boolean',
            ],
            [
                'category.required' => 'Please Select a Category'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $oldImage = $blog->image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(850, 450);
            $img->toPng()->save(base_path('public/uploads/blog_image/' . $name_gen));
            $save_url = 'uploads/blog_image/' . $name_gen;


            $blog->image = $save_url;
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category;
            $blog->description = $request->description;
            $blog->seo_title = $request->seo_title;
            $blog->seo_description = $request->seo_description;
            $blog->status = $request->status;
            $blog->save();

            $defaultImages = [
                'frontend/images/menu2_img_1.jpg',
                'frontend/images/menu2_img_2.jpg',
                'frontend/images/menu2_img_3.jpg',
            ];

            if ($oldImage && !in_array($oldImage, $defaultImages) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        } else {
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->category_id = $request->category;
            $blog->description = $request->description;
            $blog->seo_title = $request->seo_title;
            $blog->seo_description = $request->seo_description;
            $blog->status = $request->status;
            $blog->save();

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        if ($blog == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Blog Not Found!'
            ], 404);
        }

        $blogComments = BlogComment::where(['blog_id' => $blog->id])->count();
        if ($blogComments) {
            return response()->json([
                'status' => 403,
                'message' => 'This Blog Have Some Blog Comments you cant Delete It.'
            ], 403);
        }

        $defaultImages = [
            'frontend/images/menu2_img_1.jpg',
            'frontend/images/menu2_img_2.jpg',
            'frontend/images/menu2_img_3.jpg',
        ];

        if ($blog->image && !in_array($blog->image, $defaultImages) && file_exists($blog->image)) {
            unlink($blog->image);
        }

        $blog->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
