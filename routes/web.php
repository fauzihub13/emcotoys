<?php

use App\Http\Controllers\Admin\ArticleCategoryController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\OrderController as UserOrderController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\UserController as ControllersUserController;
use Illuminate\Support\Facades\Route;

Route::domain(env('APP_DOMAIN', 'emcotoys.test'))->group(function (){
    Route::get('/about', [ControllersUserController::class, 'about'])->name('about');
    Route::get('/', [ControllersUserController::class, 'index'])->name('index');
    Route::get('/product', [ControllersUserController::class, 'shop'])->name('shop');
    Route::get('/product/all', [ControllersUserController::class, 'allProduct'])->name('all-product');
    Route::get('/product/detail/{product:slug}', [ControllersUserController::class, 'detailProduct'])->where('id', '[0-9a-fA-F\-]+')->name('detail-product');
    Route::get('/article', [ControllersUserController::class, 'article'])->name('article');
    Route::get('/article-detail/{slug}', [ControllersUserController::class, 'adetail'])->name('adetail');
    Route::get('/location', [ControllersUserController::class, 'location'])->name('location');
    Route::get('/contact', [ControllersUserController::class, 'contact'])->name('contact');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ControllersUserController::class, 'profile'])->name('profile');
        Route::get('/cart', [UserOrderController::class, 'cart'])->name('cart');
        Route::post('/cart/shipping-rate', [UserOrderController::class, 'getShippingRate'])->name('cart-shipping-rate');
        Route::delete('/cart/{id}', [UserOrderController::class, 'deleteCart'])->name('delete-cart');
        Route::post('/cart/{id}/increment', [UserOrderController::class, 'incrementCart'])->name('increment-cart');
        Route::post('/cart/{id}/decrement', [UserOrderController::class, 'decrementCart'])->name('decrement-cart');
        Route::post('/product/detail/{product:slug}', [UserOrderController::class, 'addToCart'])->name('add-to-cart');
        Route::get('/cart/checkout', [UserOrderController::class, 'checkoutPage'])->name('checkout-page');
        Route::get('/history', [ControllersUserController::class, 'history'])->name('history');
        Route::get('/history/detail', [ControllersUserController::class, 'detailHistory'])->name('detail-history');
        Route::get('/order', [ControllersUserController::class, 'order'])->name('order');
    });

    Route::controller(LaravoltController::class)->group(function() {
        Route::get('/provinces', 'provinces')->name('provinces');
        Route::get('/cities', 'cities')->name('cities');
        Route::get('/districts', 'districts')->name('districts');
        Route::get('/villages', 'villages')->name('villages');
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
        'store' => StoreController::class,
        'product' => ProductController::class,
        // 'order' => OrderController::class,
    ]);

    Route::controller(OrderController::class)->group(function(){
        Route::get('/order', 'index')->name('order.index');
        Route::get('/order/edit', 'edit')->name('order.edit');
    });



});



