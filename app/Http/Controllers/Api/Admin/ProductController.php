<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductOption;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category:id,name')->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 200,
            'data' => $products
        ]);
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
                'name' => 'required|max:255|unique:products,name',
                'category' => 'required|integer',
                'price' => 'required|numeric',
                'offer_price' => 'nullable|numeric',
                'quantity' => 'required|numeric',
                'short_description' => 'required|max:500',
                'long_description' => 'required',
                'sku' => 'nullable|max:255',
                'seo_title' => 'nullable|max:255',
                'seo_description' => 'nullable|max:255',
                'show_at_home' => 'boolean',
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
            $img = $img->resize(400, 400);
            $img->toPng()->save(base_path('public/uploads/product_thumb_image/' . $name_gen));
            $save_url = 'uploads/product_thumb_image/' . $name_gen;

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

        return response()->json([
            'status' => 200,
            'message' => 'Created Successfully!'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category:id,name')->find($id);

        if ($product == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found!'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $product
        ]);
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
        $product = Product::with('category')->find($id);

        if ($product == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found!'
            ], 404);
        }

        $validator = Validator::make(
            $request->all(),
            [
                'image' => 'nullable|image|max:2048|mimes:png',
                'name' => 'required|max:255|unique:products,name,' . $id,
                'category' => 'required|integer',
                'price' => 'required|numeric',
                'offer_price' => 'nullable|numeric',
                'quantity' => 'required|numeric',
                'short_description' => 'required|max:500',
                'long_description' => 'required',
                'sku' => 'nullable|max:255',
                'seo_title' => 'nullable|max:255',
                'seo_description' => 'nullable|max:255',
                'show_at_home' => 'boolean',
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

        $oldImage = $product->thumb_image;
        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(400, 400);
            $img->toPng()->save(base_path('public/uploads/product_thumb_image/' . $name_gen));
            $save_url = 'uploads/product_thumb_image/' . $name_gen;


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

            $defaultImages = [
                'frontend/images/menu2_img_1.jpg',
                'frontend/images/menu2_img_2.jpg',
                'frontend/images/menu2_img_7.jpg',
                'frontend/images/menu2_img_4.jpg',
                'frontend/images/menu2_img_8.jpg',
            ];

            if ($oldImage && !in_array($oldImage, $defaultImages) && file_exists($oldImage)) {
                unlink($oldImage);
            }

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ]);
        } else {
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

            return response()->json([
                'status' => 200,
                'message' => 'Updated Successfully!'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Product Not Found!'
            ], 404);
        }

        $galleryImages = ProductGallery::where(['product_id' => $product->id])->count();
        if ($galleryImages > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'This Products Have Gallery Images you cant Delete It.'
            ], 403);
        }

        $productOptions = ProductOption::where(['product_id' => $product->id])->count();
        if ($productOptions > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'This Products Have Products Variants you cant Delete It.'
            ], 403);
        }

        $productRatting = ProductRating::where(['product_id' => $product->id])->count();
        if ($productRatting > 0) {
            return response()->json([
                'status' => 403,
                'message' => 'This Product Have Product Ratting you cant Delete It.'
            ], 403);
        }

        $defaultImages = [
            'frontend/images/menu2_img_1.jpg',
            'frontend/images/menu2_img_2.jpg',
            'frontend/images/menu2_img_7.jpg',
            'frontend/images/menu2_img_4.jpg',
            'frontend/images/menu2_img_8.jpg',
        ];

        if ($product->thumb_image && !in_array($product->thumb_image, $defaultImages) && file_exists($product->thumb_image)) {
            unlink($product->thumb_image);
        }

        $product->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully!'
        ]);
    }
}
