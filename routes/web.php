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

// Route::prefix('/dashboard')->middleware(['auth', 'role:admin|superAdmin'])->namespace('Dashboard')->as('dashboard.')->group(function(){

Route::prefix('/dashboard')->middleware(['auth:admin'])->namespace('Dashboard')->as('dashboard.')->group(function(){

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

});

Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');


// Route::get('/home', 'HomeController@index')->name('home');
