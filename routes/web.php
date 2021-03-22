<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/dashboard')->middleware(['auth:admin', 'role:admin|superAdmin'])->namespace('Dashboard')->as('dashboard.')->group(function(){

    Route::get('/', 'DHomeController@index')->name('home');

    //categories
    Route::get('/categories', 'DCategoryController@index')->name('categories.index');
    Route::post('/categories', 'DCategoryController@store')->name('categories.store');
    Route::post('/categories/update', 'DCategoryController@update')->name('categories.update');
    Route::delete('/categories/delete', 'DCategoryController@delete')->name('categories.delete');

    //product
    Route::get('/products', 'DProductController@index')->name('products.index');
    Route::post('/products', 'DProductController@store')->name('products.store');
    Route::post('/products/update', 'DProductController@update')->name('products.update');
    Route::delete('/products/delete/{id}', 'DProductController@delete')->name('products.delete');

    //customers
    Route::get('/users', 'DUserController@index')->name('users.index');

    //admins
    Route::get('admins', 'DAdminController@index')->name('admins.index');
    Route::put('admin/accept/{id}', 'DAdminController@makeAdmin')->name('admins.makeAdmin');

    //aria
    Route::get('aria', 'DAriaController@index')->name('aria.index');
    Route::post('aria', 'DAriaController@store')->name('aria.store');
    Route::post('aria/update', 'DAriaController@update')->name('aria.update');
    Route::delete('aria/delete/{aria_id}', 'DAriaController@delete')->name('aria.delete');

    //orders
    Route::get('/orders/waiting', 'DOrderController@waiting')->name('orders.waiting');
    Route::post('/order/approve', 'DOrderController@approve')->name('order.approve');
    Route::get('/orders/approved', 'DOrderController@approved')->name('orders.approved');


});

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');


Route::get('/home', 'HomeController@index');

Route::namespace('Front')->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/products', 'ProductController@index')->name('products.index');
    Route::get('/products/{product_id}', 'ProductController@show')->name('products.show');

    Route::middleware('auth')->group(function(){
        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::get('/cart/add', 'CartController@addToCart')->name('addToCart');
        Route::delete('/cart/delete', 'CartController@deleteItemFromCart')->name('deleteItemFromCart');
        Route::get('/cart/plus', 'CartController@plus')->name('quantityPlus');
        Route::get('/cart/minus', 'CartController@minus')->name('quantityMinus');

        Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
        Route::get('/checkout/chose_aria', 'CheckoutController@choseAria')->name('choseAria');

        Route::post('/order/store', 'OrderController@store')->name('order.store');

    });
});

