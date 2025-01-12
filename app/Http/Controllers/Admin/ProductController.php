<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:255', 'unique:products,name'],
            'category' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'offer_price' => ['nullable', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'short_description' => ['required', 'max:500'],
            'long_description' => ['required'],
            'sku' => ['nullable', 'max:255'],
            'seo_title' => ['nullable', 'max:255'],
            'seo_description' => ['nullable', 'max:255'],
            'show_at_home' => ['boolean'],
            'status' => ['required','boolean'],
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(400,400);
            $img->toJpeg(80)->save(base_path('public/uploads/product_thumb_image/'.$name_gen));
            $save_url = 'uploads/product_thumb_image/'.$name_gen;

            $product = new Product();
            $product->thumb_image = $save_url;
            $product->name = $request->name;
            // $product->slug = generateUniqueSlug('Product', $request->name);
            $product->slug = Str::slug($request->name);
            $product->category_id = $request->category;
            $product->price = $request->price;
            $product->offer_price = $request->offer_price ?? 0;
            $product->quantity = $request->quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->sku = $request->sku;
            $product->seo_title = $request->seo_title;
            $product->seo_description = $request->seo_description;
            $product->show_at_home = $request->show_at_home;
            $product->status = $request->status;
            $product->save();
        }

        toastr()->success('Create Successfully');
        return redirect()->route('admin.product.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:255', 'unique:products,name,'.$id],
            'category' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'offer_price' => ['nullable', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'short_description' => ['required', 'max:500'],
            'long_description' => ['required'],
            'sku' => ['nullable', 'max:255'],
            'seo_title' => ['nullable', 'max:255'],
            'seo_description' => ['nullable', 'max:255'],
            'show_at_home' => ['boolean'],
            'status' => ['required','boolean'],
        ]);

        $oldImage = $request->old_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(400,400);
            $img->toJpeg(80)->save(base_path('public/uploads/product_thumb_image/'.$name_gen));
            $save_url = 'uploads/product_thumb_image/'.$name_gen;

            $product = Product::findOrFail($id);
            $product->thumb_image = $save_url;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->category_id = $request->category;
            $product->price = $request->price;
            $product->offer_price = $request->offer_price ?? 0;
            $product->quantity = $request->quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->sku = $request->sku;
            $product->seo_title = $request->seo_title;
            $product->seo_description = $request->seo_description;
            $product->show_at_home = $request->show_at_home;
            $product->status = $request->status;
            $product->save();

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            toastr()->success('Updated Successfully');
            return redirect()->route('admin.product.index');
        }else{
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->category_id = $request->category;
            $product->price = $request->price;
            $product->offer_price = $request->offer_price ?? 0;
            $product->quantity = $request->quantity;
            $product->short_description = $request->short_description;
            $product->long_description = $request->long_description;
            $product->sku = $request->sku;
            $product->seo_title = $request->seo_title;
            $product->seo_description = $request->seo_description;
            $product->show_at_home = $request->show_at_home;
            $product->status = $request->status;
            $product->save();

            toastr()->success('Updated Successfully');
            return redirect()->route('admin.product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        unlink($product->thumb_image);
        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
