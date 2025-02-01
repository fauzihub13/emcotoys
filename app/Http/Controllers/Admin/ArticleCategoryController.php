<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.article-category.index', [
            'type_menu' => 'article-category',
            'categories' => ArticleCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.article-category.create', [
            'type_menu' => 'article-category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            // Create Slug
            $slug = Str::slug($request->name);

            // Validate slug
            $count = ArticleCategory::where('slug', $slug)->count();
            if ($count) {
                // Unique slug by adding number
                $slug .= '-' . ($count + 1);
            }

            $articleCategory = new ArticleCategory();
            $articleCategory->name = $request->name;
            $articleCategory->slug = $slug;
            $articleCategory->save();

            return redirect()->route('article.category.index')->with('status', 'Article category created successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to create Article category. Please try again.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticleCategory $articleCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticleCategory $category)
    {
        try {
            $category = ArticleCategory::find($category->id);
            return view('admin.pages.article-category.edit', [
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
    public function update(Request $request, ArticleCategory $category)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            // Create Slug
            $slug = Str::slug($request->name);

            // Validate slug
            if ($slug != $category->slug) {
                $count = ArticleCategory::where('slug', $slug)->count();
                if ($count) {
                    // Unique slug by adding number
                    $slug .= '-' . ($count + 1);
                }
            }

            $articleCategory = ArticleCategory::find($category->id);
            $articleCategory->name = $request->name;
            $articleCategory->slug = $slug;
            $articleCategory->save();

            return redirect()->route('article.category.index')->with('status', 'Article category created successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update article category. Please try again. ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticleCategory $category)
    {
        try {
            $category = ArticleCategory::findOrFail($category->id);
            if($category){
                $category->delete();
                return redirect()->route('article.category.index')->with('success', 'Article category deleted successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete article category. Please try again. '. $th->getMessage());

        }
    }
}
