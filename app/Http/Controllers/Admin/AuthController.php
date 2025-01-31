<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function updateProfilePage(){

        return view('admin.pages.user.edit-profile', [
            'type_menu' => 'profile'
        ]);
   }

}
