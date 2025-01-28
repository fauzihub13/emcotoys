<?php

use Illuminate\Support\Facades\Route;

Route::domain(env('APP_DOMAIN', 'emcotoys.test'))->group(function (){
    Route::get('/', function () {
        return 'USER';
    });
});


Route::domain('admin.'. env('APP_DOMAIN', 'emcotoys.test'))->group(function (){
    Route::get('/', function () {
        return view('admin.pages.index');
    });
    Route::get('/login', function () {
        return view('admin.pages.auth.login');
    });
    Route::get('/register', function () {
        return view('admin.pages.auth.register');
    });
    Route::get('/forgot-password', function () {
        return view('admin.pages.auth.forgot-password');
    });
});



