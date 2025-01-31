<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userListPage() {
        return view('admin.pages.user.list-user', [
            'type_menu' => 'users'
        ]);
    }
}
