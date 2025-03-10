<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UserController as ControllersUserController;
use Illuminate\Support\Facades\Route;

Route::domain(env('APP_DOMAIN', 'emcotoys.test'))->group(function (){
    Route::get('/about', [ControllersUserController::class, 'about'])->name('about');
    Route::get('/', [ControllersUserController::class, 'index'])->name('index');
    Route::get('/product', [ControllersUserController::class, 'shop'])->name('shop');
    Route::get('/product/all', [ControllersUserController::class, 'allProduct'])->name('all-product');
    Route::get('/product/detail', [ControllersUserController::class, 'detailProduct'])->name('detail-product');
    Route::get('/article', [ControllersUserController::class, 'article'])->name('article');
    Route::get('/article-detail', [ControllersUserController::class, 'adetail'])->name('adetail');
    Route::get('/location', [ControllersUserController::class, 'location'])->name('location');
    Route::get('/contact', [ControllersUserController::class, 'contact'])->name('contact');
    Route::get('/profile', [ControllersUserController::class, 'profile'])->name('profile');
    Route::get('/cart', [ControllersUserController::class, 'cart'])->name('cart');
    Route::get('/history', [ControllersUserController::class, 'history'])->name('history');
    Route::get('/order', [ControllersUserController::class, 'order'])->name('order');
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
        'store' => StoreController::class,
        'product' => ProductController::class,
        // 'order' => OrderController::class,
    ]);

    Route::controller(OrderController::class)->group(function(){
        Route::get('/order', 'index')->name('order.index');
        Route::get('/order/edit', 'edit')->name('order.edit');
    });



});



