<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Carbon\Carbon;
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
            'name'=> 'required|string|min:3|max:255|unique:article_categories',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            $slug = Str::slug($request->name);

            // Check for existing slugs
            $originalSlug = $slug;
            $counter = 1;

            while (ArticleCategory::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $articleCategory = new ArticleCategory();
            $articleCategory->name = $request->name;
            $articleCategory->slug = $slug;
            $articleCategory->save();

            return redirect()->route('article.category.index')->with('success', 'Article category created successfully.');

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
            'name'=> 'required|string|min:3|max:255|unique:article_categories,name,'.$category->id,
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $articleCategory = ArticleCategory::find($category->id);

            // Create Slug
            $slug = Str::slug($request->name);

            // Validate slug
            if ($slug != $category->slug) {
                $slug = Str::slug($request->name);

                // Check for existing slugs
                $originalSlug = $slug;
                $counter = 1;

                while (ArticleCategory::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $articleCategory->slug = $slug;

            }

            $articleCategory->name = $request->name;
            $articleCategory->updated_at = Carbon::now();
            $articleCategory->save();

            return redirect()->route('article.category.index')->with('success', 'Article category updated successfully.');

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
