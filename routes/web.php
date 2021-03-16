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

Route::prefix('/dashboard')->middleware(['auth'])->namespace('Dashboard')->as('dashboard.')->group(function(){

    Route::get('/', 'DHomeController@index')->name('home');

    //categories
    Route::get('/categories', 'DCategoryController@index')->name('categories.index');
    Route::post('/categories', 'DCategoryController@store')->name('categories.store');
    Route::post('/categories/update', 'DCategoryController@update')->name('categories.update');
    Route::delete('/categories/delete', 'DCategoryController@delete')->name('categories.delete');

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
