<?php

use App\Http\Controllers\backend\DeliveryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\frontend\MailController;
use App\Http\Controllers\frontend\OrderController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/config-cache', function () {
    Artisan::call('config:clear');
    //return view('backend.system.dashboard');
});

Route::get('/start', function () {
    Artisan::call('serve');
    //return view('backend.system.dashboard');
});

Route::get('/testpass', [UserController::class, 'testpass'])->name('b.testpass');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', [UserController::class, 'login'])->name('b.login');
    Route::post('/login', [UserController::class, 'loginpost'])->name('b.loginpost');

    Route::group(['middleware' => 'backend.auth'], function () {
        Route::group(['middleware' => 'frontend.changeLanguage'], function () {
            Route::resource('/product', ProductController::class);
            Route::resource('/user', UserController::class);
            Route::get('/delivery', [DeliveryController::class, 'index'])->name('b.delivery');
            Route::get('/delivery/{id}', [DeliveryController::class, 'updateOrder'])->name('b.updated_delivery');
            Route::put('/delivery/{id}', [DeliveryController::class, 'updateOrderPost'])->name('b.updated_deliverypost');
        });
        Route::get('/', function () {
            return view('backend.system.dashboard');
        });
        Route::get('/logout', [UserController::class, 'logout'])->name('b.logout');
    });
});


Route::group(['prefix' => 'client'], function () {
    Route::group(['middleware' => 'frontend.changeLanguage'], function () {
        Route::get('/', [HomeController::class, 'index'])->name('f.index');
        Route::get('/product', [HomeController::class, 'product'])->name('f.product');
        Route::get('/product/{id}', [HomeController::class, 'show'])->name('f.showproduct');

        Route::get('/contact', [MailController::class, 'contact'])->name('f.contact');
        Route::get('/product/filter', [HomeController::class, 'productPriceLevel1'])->name('f.productPriceLevel1');

        Route::get('/cart/checkout', [HomeController::class, 'checkout'])->name('f.checkout');
        Route::post('/cart/checkout', [OrderController::class, 'create'])->name('f.createorder');
        Route::get('/completed', [OrderController::class, 'completed'])->name('f.completed');

        Route::get('/mail', [MailController::class, 'form'])->name('f.mailform');
        Route::post('/mail', [MailController::class, 'formpost'])->name('f.mailpost');

        Route::get('/cart', [CartController::class, 'cart'])->name('f.cart');
        Route::post('/cart/add/detail', [CartController::class, 'addtocart'])->name('f.addtocart');
        Route::post('/cart/add', [CartController::class, 'addtocart_post'])->name('f.addtocart_post');
        Route::get('/remove-item/{id}', [CartController::class, 'removeitem'])->name('f.removeitem');
        Route::post('/remove-item', [CartController::class, 'removeitem_post'])->name('f.removeitem_post');
        Route::post('/update-cart', [CartController::class, 'updatecart'])->name('f.updatecart');

        Route::get('/testDatabse', [LanguageController::class, 'test'])->name('f.changeLanguageDatabase');
    });
    Route::get('/language/{lang}', [LanguageController::class, 'changeLanguage'])->name('f.changeLanguage');
});