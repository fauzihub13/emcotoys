<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MarketPlaceController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::domain(env('APP_DOMAIN', 'emcotoys.test'))->group(function (){
    Route::get('/', function () {
        return 'USER';
    });
});


Route::domain('admin.'. env('APP_DOMAIN', 'emcotoys.test'))->middleware(['auth', 'verified', 'roleCheck:admin,super_admin'])->group(function (){
    Route::get('/', function () {
        return view('admin.pages.index');
    });

    // Dashboard
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/', 'dashboardPage')->name('home');
    });

    // Auth
    Route::controller(AuthController::class)->group(function(){
        Route::get('/profile', 'updateProfilePage')->name('user.update-profile-page');
    });

    // User
    Route::controller(UserController::class)->middleware(['roleCheck:super_admin'])->group(function(){
        Route::get('/users', 'userListPage')->name('user.list-page');
        Route::get('/users/edit/{user}', 'editUserPage')->name('user.edit-user');
        Route::put('/users/edit/{user}', 'updateUser')->name('user.update-user');
        Route::delete('/users/delete/{user}', 'deleteUser')->name('user.delete-user');
    });

    // Article Category
    Route::prefix('article')->group(function () {
        Route::resources([
            'category' => ArticleCategoryController::class,
        ], ['as' => 'article']);
    });

    // Product Category
    Route::prefix('product')->group(function () {
        Route::resources([
            'category' => ProductCategoryController::class,
        ], ['as' => 'product']);
    });

    // Article
    Route::resources([
        'article' => ArticleController::class,
        'marketplace' => MarketPlaceController::class,
        'store' => StoreController::class,
        'product' => ProductController::class,
        'transaction' => TransactionController::class,
    ]);



});



