<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage() {
        return view('admin.pages.auth.login');
    }
    public function registerPage() {
        return view('admin.pages.auth.register');
    }
    public function forgotPasswordPage() {
        return view('admin.pages.auth.forgot-password');
    }
}
