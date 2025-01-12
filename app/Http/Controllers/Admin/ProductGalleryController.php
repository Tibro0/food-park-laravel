<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId)
    {
        $images = ProductGallery::where('product_id', $productId)->get();
        $product = Product::findOrFail($productId);
        return view('admin.product.gallery.index', compact('product', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:3000'],
            'product_id' => ['required', 'integer']
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(400,400);
            $img->toJpeg(80)->save(base_path('public/uploads/product_gallery_image/'.$name_gen));
            $save_url = 'uploads/product_gallery_image/'.$name_gen;

            $gallery = new ProductGallery();
            $gallery->product_id = $request->product_id;
            $gallery->image = $save_url;
            $gallery->save();
        }

        toastr()->success('Created Successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = ProductGallery::findOrFail($id);
        unlink($image->image);
        $image->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }
}
