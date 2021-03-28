<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    Route::get('categories', 'MobileController@get_categories');

    Route::get('products', 'MobileController@get_products');

    Route::get('category_products/{category_id}', 'MobileController@get_category_products');

    Route::get('products/{product_id}', 'MobileController@get_product');

    Route::middleware('auth:api')->group(function(){


        Route::get('arias', 'MobileController@get_areas');

        Route::post('/order/store', 'MobileController@store_order');

        Route::get('order_list/{user_id}', 'MobileController@get_order_list');

    });




