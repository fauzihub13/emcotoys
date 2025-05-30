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
use App\Http\Controllers\MailController;

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
    Route::get('/contact/liat', [ControllersUserController::class, 'liat'])->name('liat');
    Route::post('/contact/send', [ControllersUserController::class, 'sendContact'])->name('sendContact');
    Route::get('/send-email', [MailController::class, 'sendEmail']);
    Route::post('/use-another-account', [ControllersUserController::class, 'useAnotherAccount'])->name('useAnotherAccount');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/profile', [ControllersUserController::class, 'profile'])->name('profile');
        Route::get('/cart', [UserOrderController::class, 'cart'])->name('cart');
        Route::post('/cart/shipping-rate', [UserOrderController::class, 'getShippingRate'])->name('cart-shipping-rate');
        Route::delete('/cart/{id}', [UserOrderController::class, 'deleteCart'])->name('delete-cart');
        Route::post('/cart/{id}/increment', [UserOrderController::class, 'incrementCart'])->name('increment-cart');
        Route::post('/cart/{id}/decrement', [UserOrderController::class, 'decrementCart'])->name('decrement-cart');
        Route::post('/product/detail/{product:slug}', [UserOrderController::class, 'addToCart'])->name('add-to-cart');
        Route::get('/cart/checkout', [UserOrderController::class, 'checkoutPage'])->name('checkout-page');
        Route::post('/cart/checkout', [UserOrderController::class, 'checkout'])->name('checkout');
        Route::get('/cart/checkout/payment/{orderId}', [UserOrderController::class, 'paymentPage'])->name('payment-page');
        Route::get('/payment/status/{statusParameter}', [UserOrderController::class, 'paymentStatus'])->name('payment-status');
        Route::get('/history', [ControllersUserController::class, 'history'])->name('history');
        Route::get('/history/{orderId}', [ControllersUserController::class, 'detailHistory'])->name('detail-history');
        Route::get('/track-order/{order}', [UserOrderController::class, 'trackOrder'])->name('track-order');
        Route::put('/track-order/finish/{order}', [UserOrderController::class, 'finishOrder'])->name('finish-order');
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
        Route::get('/chart-data', 'getTransactionChartData')->name('chart');
        Route::get('/transaction-recap', 'getUserTransactionRecap')->name('transaction.recap');
        Route::get('/transaction-percentage', 'getTransactionPercentage')->name('transaction.percentage');
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
        Route::get('/order/{order:order_number}/edit', 'edit')->name('order.edit');
        Route::put('/order/{order:order_number}/edit', 'update')->name('order.update');
        Route::get('/track-order/{order}', [UserOrderController::class, 'trackOrder'])->name('admin.track-order');

    });



});



