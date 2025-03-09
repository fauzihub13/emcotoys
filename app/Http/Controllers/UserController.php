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
        return view('user.pages.shop', [
            'type_menu'=> 'shop'
        ]);
    }
    public function article()
    {
        return view('user.pages.article', [
            'type_menu'=> 'article'
        ]);
    }
}
