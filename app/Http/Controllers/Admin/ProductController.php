<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
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
            'stores' => Product::where('deleted_at', '=', null)->get()
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
            'category_id'=>'required|string|exists:article_categories,id',
            'description'=>'required|text|min:3',
            'price'=>'required|string|min:3|max:255',
            'weigth'=>'required|string|min:3|max:255',
            'height'=>'required|string|min:3|max:255',
            'width'=>'required|string|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            $slug = Str::slug($request->name);

            // Check for existing slugs
            $originalSlug = $slug;
            $counter = 1;

            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $productCategory = new Product();
            $productCategory->name = $request->name;
            $productCategory->slug = $slug;
            $productCategory->save();

            return redirect()->route('product.index')->with('success', 'Product created successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to create Product category. Please try again.' . $th->getMessage());
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
