<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('user.pages.product.shop', [
            'type_menu'=> 'shop'
        ]);
    }
    public function article()
    {
        return view('user.pages.article', [
            'type_menu'=> 'article'
        ]);
    }
    public function detailProduct()
    {
        return view('user.pages.product.detail-product', [
            'type_menu'=> 'shop'
        ]);
    }
    public function adetail()
    {
        return view('user.pages.article-detail', [
            'type_menu'=> 'adetail'
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
    public function cart()
    {
        return view('user.pages.profile.cart', [
            'type_menu'=> 'cart'
        ]);
    }
    public function history()
    {
        return view('user.pages.profile.history', [
            'type_menu'=> 'history'
        ]);
    }
    public function order()
    {
        return view('user.pages.profile.order', [
            'type_menu'=> 'order'
        ]);
    }
}
