<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.article.index', [
            'type_menu' => 'article',
            'articles' => Article::with(['category'])->where('deleted_at', '=', null)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.article.create', [
            'type_menu' => 'article',
            'categories' => ArticleCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|string|min:3|max:255',
            'body'=>'required|string|min:3',
            'thumbnail'=>'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id'=> 'required|string|exists:article_categories,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            if($request->hasFile('thumbnail')){
                $path = $request->file('thumbnail')->store("images/articles", 'public');
            }

            $slug = Str::slug($request->title);

            // Check for existing slugs
            $originalSlug = $slug;
            $counter = 1;

            while (Article::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $articleCategory = new Article();
            $articleCategory->slug = $slug;
            $articleCategory->thumbnail = $path;
            $articleCategory->category_id = $request->category_id;
            $articleCategory->title = $request->title;
            $articleCategory->body = $request->body;
            $articleCategory->save();

            return redirect()->route('article.index')->with('success', 'Article created successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to create article . Please try again.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        try {
            $categories = ArticleCategory::all();
            $article = Article::with(['category'])->find($article->id);
            return view('admin.pages.article.edit', [
                'type_menu' => 'article',
                'categories' => $categories,
                'article' => $article
            ]);
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|string|min:3|max:255',
            'body'=>'required|string|min:3',
            'thumbnail'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'category_id'=> 'required|string|exists:article_categories,id',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $article = Article::find($article->id);

            if($request->hasFile('thumbnail')){
                $path = $request->file('thumbnail')->store("images/articles", 'public');
                $article->thumbnail = $path;
            }

            // Create Slug
            $slug = Str::slug($request->title);

            // Validate slug
            if ($slug != $article->slug) {
               $slug = Str::slug($request->title);

                // Check for existing slugs
                $originalSlug = $slug;
                $counter = 1;

                while (Article::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $article->slug = $slug;

            }

            $article->category_id = $request->category_id;
            $article->title = $request->title;
            $article->body = $request->body;
            $article->updated_at = Carbon::now();

            $article->save();

            return redirect()->route('article.index')->with('success', 'Article updated successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update article . Please try again.' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        try {
            $article = Article::findOrFail($article->id);
            if($article){
                $article->deleted_at = Carbon::now();
                $article->save();
                return redirect()->route('article.index')->with('success', 'Article deleted successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete article. Please try again. '. $th->getMessage());

        }
    }
}
