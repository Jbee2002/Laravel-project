<?php

namespace App\Http\Controllers;
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

Route::get('', [HomeController::class, 'home'])->name('home');
Route::get('/{category}-{slug}', [HomeController::class, 'category'])->name('home.category');
Route::get('shop', [HomeController::class, 'shop'])->name('home.shop');
Route::get('san-pham/{product}-{slug}', [HomeController::class, 'product'])->name('home.product');

Route::get('yeu-thich/{id}', [HomeController::class, 'favorite'])->name('home.favorite');
Route::get('bo-yeu-thich/{id}', [HomeController::class, 'unfavorite'])->name('home.unfavorite');
Route::get('customer/san-pham-yeu-thich', [HomeController::class, 'favorites_list'])->name('home.product_favorite');

Route::get('order_history', [HomeController::class, 'order_history'])->name('home.order_history');
Route::get('order_details/{id}', [HomeController::class, 'order_details'])->name('home.order_details');

Route::get('register', [HomeController::class, 'register'])->name('home.register');
Route::post('register', [HomeController::class, 'post_register']);

Route::get('login', [HomeController::class, 'login'])->name('home.login');
Route::post('login', [HomeController::class, 'post_login']);
Route::get('logout', [HomeController::class, 'logout'])->name('home.logout');

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.index');
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/order/{id}', [CustomerController::class, 'order_id'])->name('order_id');
    Route::get('/order_list', [CustomerController::class, 'order_list'])->name('order_list');
    Route::get('/otd/{id}', [CustomerController::class, 'order_details'])->name('order_detail');
    Route::get('/order_no_account', [CustomerController::class, 'no_account'])->name('no_account');
    Route::get('/order_have_account', [CustomerController::class, 'have_account'])->name('have_account');

    Route::resources([
        'category'=> CategoryController::class,
        'product'=> ProductController::class,
        'banner'=> BannerController::class

    ]);

    Route::group(['prefix' => 'category'], function () {
        Route::get('category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
        Route::get('restore/{category}', [CategoryController::class, 'restore'])->name('category.restore');
        Route::delete('force-delete/{category}', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('product/trashed', [ProductController::class, 'trashed'])->name('product.trashed');
        Route::get('restore/{product}', [ProductController::class, 'restore'])->name('product.restore');
        Route::delete('force-delete/{product}', [ProductController::class, 'forceDelete'])->name('product.forceDelete');
    });
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/view', [CartController::class, 'view'])->name('cart.view');
    Route::get('/checkout', [CartController::class, 'form'])->name('cart.checkout');
    Route::post('/checkout', [CartController::class, 'submit_form']);
    Route::get('/checkout/success', [CartController::class, 'checkout_success'])->name('cart.checkout_success');
});

//cổng thanh toán 
Route::post('/checkout/vnpay', [PaymentContrller::class, 'vnpay_payment'])->name('checkout.vnpay');
