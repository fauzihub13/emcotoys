<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }
    public function about()
    {
        return view('user.about');
    }
    public function shop()
    {
        return view('user.shop');
    }
    public function article()
    {
        return view('user.article');
    }
    public function product()
    {
        return view('user.product');
    }
}
