<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $product = Product::find($productId)->only(['id', 'name']);

        if ($product == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => [
                'product' => $product,
                'images' => $images
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|max:2048|mimes:png',
            'product_id' => 'required|integer',
        ]);

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
            $img = $img->resize(400, 400);
            $img->toPng()->save(base_path('public/uploads/product_gallery_image/' . $name_gen));
            $save_url = 'uploads/product_gallery_image/' . $name_gen;

            $gallery = new ProductGallery();
            $gallery->product_id = $request->product_id;
            $gallery->image = $save_url;
            $gallery->save();
        }

        return response()->json([
            'status' => 200,
            'message' => 'Created Successfully!',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = ProductGallery::find($id);

        if ($image == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Image Not Found!'
            ], 404);
        }

        $defaultImages = [
            'frontend/images/menu4.png',
            'frontend/images/menu6.png',
            'frontend/images/menu7.png',
            'frontend/images/menu8.png',
            'frontend/images/menu1.png',
            'frontend/images/menu2.png',
            'frontend/images/menu5.png',
        ];

        if ($image->image && !in_array($image->image, $defaultImages) && file_exists($image->image)) {
            unlink($image->image);
        }

        $image->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ], 200);
    }
}
