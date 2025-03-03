<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.product.index', [
            'type_menu' => 'product',
            'products' => Product::where('deleted_at', '=', null)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product.create', [
            'type_menu' => 'product',
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
            'category_id'=>'nullable|string|exists:product_categories,id',
            'description'=>'required|string|min:3',
            'price'=>'required|integer|min:1',
            'weight'=>'required|integer|min:1',
            'length'=>'required|integer|min:1',
            'height'=>'required|integer|min:1',
            'width'=>'required|integer|min:1',
            'stock'=>'required|integer|min:0',
            'age'=>'required|integer|min:0',
            'sku'=>'required|string|min:3|max:255',
            'status'=>'nullable|string|in:on',
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            // dd($request->all());

            $slug = Str::slug($request->name);

            // Check for existing slugs
            $originalSlug = $slug;
            $counter = 1;

            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $status = false ;
            if($request->status) {
                $status = true;
            };

            $product = new Product();
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->slug = $slug;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->weight = $request->weight;
            $product->length = $request->length;
            $product->width = $request->width;
            $product->height = $request->height;
            $product->stock = $request->stock;
            $product->age = $request->age;
            $product->sku = $request->sku;
            $product->status = $status;
            $product->save();

            if ($request->hasFile('images')) {
                // Looping
                foreach ($request->file('images') as $image) {
                    // Storage
                    $path = $image->store('product', 'public');

                    // Save image
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path
                    ]);
                }
            }

            return redirect()->route('product.index')->with('success', 'Product created successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to create product. Please try again.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        try {
            return view('admin.pages.product.edit', [
                'type_menu' => 'product',
                'product' => Product::find($product->id),
                'categories' => ProductCategory::all()

            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to find product. Please try again.' . $th->getMessage());

        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
            'category_id'=>'nullable|string|exists:product_categories,id',
            'description'=>'required|string|min:3',
            'price'=>'required|integer|min:1',
            'weight'=>'required|integer|min:1',
            'length'=>'required|integer|min:1',
            'height'=>'required|integer|min:1',
            'width'=>'required|integer|min:1',
            'stock'=>'required|integer|min:0',
            'age'=>'required|integer|min:0',
            'sku'=>'required|string|min:3|max:255',
            'status'=>'nullable|string|in:on',
            'delete_images' => 'nullable|array|min:1',
            'images' => 'nullable|array|min:1',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            // dd($request->all());

            $product = Product::with('images')->find($product->id);
            $currentProductImages= $product->images->count();

            $deletedImagesList = $request->has('delete_images') ? count($request->input('delete_images')) : 0;
            $newImages = $request->hasFile('images') ? count($request->file('images')) : 0;

            if ($deletedImagesList == $currentProductImages  && $newImages == 0) {
                return back()->with('error', 'Atleast one product image.');
            }

            if ($deletedImagesList > 0 && $deletedImagesList <= $currentProductImages) {
                // Hitung gambar yang tersisa setelah penghapusan
                $remainingImages = $currentProductImages - $deletedImagesList + $newImages;

                // Pastikan minimal satu gambar tetap ada
                if ($remainingImages > 0) {
                    foreach ($request->delete_images as $imageId) {
                        // Mengambil gambar produk
                        $image = ProductImage::find($imageId);

                        if ($image) {
                            // Menghapus gambar dari penyimpanan
                            Storage::disk('public')->delete($image->path);

                            // Menghapus gambar dari database
                            $image->delete();
                        }
                    }
                }
            }

            // Menambahkan gambar baru jika ada
            if ($newImages > 0) {
                foreach ($request->file('images') as $image) {
                    // Simpan gambar baru ke storage
                    $path = $image->store('product', 'public');

                    // Simpan path gambar ke database
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $path
                    ]);
                }
            }

            // Create Slug
            $slug = Str::slug($request->title);

            // Validate slug
            if ($slug != $product->slug) {
               $slug = Str::slug($request->name);

                // Check for existing slugs
                $originalSlug = $slug;
                $counter = 1;

                while (Product::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $product->slug = $slug;

            }

            $status = false ;
            if($request->status) {
                $status = true;
            };

            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->slug = $slug;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->weight = $request->weight;
            $product->length = $request->length;
            $product->width = $request->width;
            $product->height = $request->height;
            $product->stock = $request->stock;
            $product->age = $request->age;
            $product->sku = $request->sku;
            $product->status = $status;
            $product->updated_at = Carbon::now();
            $product->save();

            return redirect()->route('product.index')->with('success', 'Product updated successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update product . Please try again.' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product = Product::find($product->id);
            if($product){
                $product->deleted_at = Carbon::now();
                $product->save();
                return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete product. Please try again. '. $th->getMessage());

        }

    }
}
