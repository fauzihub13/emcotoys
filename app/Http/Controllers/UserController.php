<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class UserController extends Controller
{
    public function index()
    {
        return view('user.pages.index', [
            'type_menu'=> 'home'
        ]);
    }
    public function about()
    {
        return view('user.pages.about', [
            'type_menu'=> 'about-us'
        ]);
    }
    public function shop()
    {
        $products = Product::with(['images' => function ($query) {
            $query->orderBy('id')->limit(1);
        }])
        ->notInTrash()
        ->descending()
        ->paginate(12);

        return view('user.pages.product.shop', [
            'type_menu'=> 'shop',
            'products' => $products
        ]);
    }
    public function article()
    {
        $search = request('search');

        $articles = Article::filter(request(['search']))->notInTrash()->descending()->paginate(2)->appends(['search' => $search]);
        return view('user.pages.article', [
            'type_menu'=> 'article',
            'articles' => $articles,
            'latest_articles' => Article::descending()->limit(3)->get(),
            'article_categories' => ArticleCategory::notInTrash()->descending()->get()
        ]);
    }
    public function adetail($slug)
    {
        $article = Article::where('slug', $slug)->first();
        return view('user.pages.article-detail', [
            'type_menu'=> 'article',
            'article'=> $article,
            'latest_articles' => Article::where('slug', '!=', $slug)->orderBy('created_at', 'desc')->limit(2)->get()
        ]);
    }
    public function location()
    {
        return view('user.pages.location', [
            'type_menu'=> 'location'
        ]);
    }
    public function contact()
    {
        return view('user.pages.contact', [
            'type_menu'=> 'contact'
        ]);
    }

    public function profile()
    {
        return view('user.pages.profile.account', [
            'type_menu'=> 'account'
        ]);
    }

    public function checkoutPage()
    {
        return view('user.pages.product.checkout', [
            'type_menu'=> 'shop'
        ]);
    }

    public function history()
    {
        return view('user.pages.profile.history', [
            'type_menu'=> 'history'
        ]);
    }
    public function detailHistory()
    {
        return view('user.pages.profile.detail-history', [
            'type_menu'=> 'history'
        ]);
    }
    public function order()
    {
        return view('user.pages.profile.order', [
            'type_menu'=> 'order'
        ]);
    }

    public function allProduct()
    {
        $filters = [
            'category' => request('category'),
            'minAge' => request('minAge'),
            'maxAge' => request('maxAge'),
        ];

        // dd( $filters);

        $products = Product::with(['images' => function ($query) {
            $query->orderBy('id')->limit(1);
        }])
        ->filter($filters)
        ->notInTrash()
        ->descending()
        ->paginate(12)
        ->appends($filters);

        return view('user.pages.product.all-product', [
            'type_menu'=> 'shop',
            'products'=> $products,
            'products_categories' => ProductCategory::notInTrash()->get()
        ]);
    }

    public function detailProduct(Product $product)
    {
        // $relatedProducts = Product::with(['images' => function ($query) {
        //     $query->orderBy('id')->limit(1);
        // }]);

        $product = Product::with('category')->where('id', $product->id)->first();

        return view('user.pages.product.detail-product', [
            'type_menu' => 'shop',
            'product'=> $product
        ]);
    }

}
