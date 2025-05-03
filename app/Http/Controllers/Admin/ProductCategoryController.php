<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.product-category.index', [
            'type_menu' => 'product-category',
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product-category.create', [
            'type_menu' => 'product-category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255|unique:product_categories',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            $slug = Str::slug($request->name);

            // Check for existing slugs
            $originalSlug = $slug;
            $counter = 1;

            while (ProductCategory::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $productCategory = new ProductCategory();
            $productCategory->name = $request->name;
            $productCategory->slug = $slug;
            $productCategory->save();

            return redirect()->route('product.category.index')->with('success', 'Product category created successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to create product category. Please try again.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $category)
    {
        try {
            $category = ProductCategory::find($category->id);
            return view('admin.pages.product-category.edit', [
                'type_menu' => 'article-category',
                'category' => $category
            ]);
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:255|unique:product_categories,name,' . $category->id,
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $articleCategory = ProductCategory::find($category->id);

            // Create Slug
            $slug = Str::slug($request->name);

            // Validate slug
            if ($slug != $category->slug) {
                $slug = Str::slug($request->name);

                // Check for existing slugs
                $originalSlug = $slug;
                $counter = 1;

                while (ProductCategory::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $articleCategory->slug = $slug;
            }

            $articleCategory->name = $request->name;
            $articleCategory->updated_at = Carbon::now();
            $articleCategory->save();

            return redirect()->route('product.category.index')->with('success', 'Product category updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update product category. Please try again. ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $category)
    {
        try {
            $category = ProductCategory::findOrFail($category->id);
            if ($category) {
                $category->delete();
                return redirect()->route('product.category.index')->with('success', 'Product category deleted successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete product category. Please try again. ' . $th->getMessage());
        }
    }
}
