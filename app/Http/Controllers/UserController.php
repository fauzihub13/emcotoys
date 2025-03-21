<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Cart;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Mail\ContactMail;
use App\Mail\ConfirmationMail;
use App\Models\Order;

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
        $stores = Store::all();
        return view('user.pages.location', [
            'type_menu'=> 'location',
            'stores' => $stores
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

    public function history()
    {
        $orders = Order::with(['orderItems'])->descending()->get();

        return view('user.pages.profile.history', [
            'type_menu' => 'history',
            'ordersFinish' => $orders->where('status', 'arrived'),
            'ordersOnProcess' => $orders->filter(function ($order) {
                return $order->status !== 'arrived' &&
                    $order->transaction_status !== 'cancel' && $order->transaction_status !== 'expire';
            }),
            'ordersCancel' => $orders->filter(function ($order) {
                return $order->transaction_status === 'cancel' || $order->transaction_status === 'expire';
            }),
        ]);
    }

    public function detailHistory($orderId)
    {
        $order = Order::with(['orderItems'])->where('order_number', $orderId)->first();
        if ($order) {
            $isPaid = false;
            $transactionStatus = $order->transaction_status;

            if(in_array($transactionStatus, ['capture','settlement'])){
                $isPaid = true;
            }
            return view('user.pages.profile.detail-history', [
                'type_menu'=> 'history',
                'order'=> $order,
                'snapToken' => $order->midtrans_response,
                'isPaid' => $isPaid,
                'transactionStatus'=> $transactionStatus
            ]);
        } else {
            return redirect()->route('history')->with('error', 'Transaction history not found');
        }

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
        $relatedProducts = Product::notInTrash()->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $product = Product::with('category')->where('id', $product->id)->first();

        return view('user.pages.product.detail-product', [
            'type_menu' => 'shop',
            'product'=> $product,
            'relatedProducts' => $relatedProducts
        ]);
    }
    public function liat()
    {
        return view('user.pages.email.confirmationtest', [
            'type_menu' => 'shop'
        ]);
    }

    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone') ?? 'N/A',
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];

        Mail::to('jedarjederbp2@gmail.com')->send(new ContactMail($data));

        Mail::to($data['email'])->send(new ConfirmationMail($data));

        return back()->with('success', 'Your message has been sent successfully!');
    }
}
