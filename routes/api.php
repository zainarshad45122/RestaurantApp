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


Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
});

Route::post('login', 'PassportController@login');
Route::post('register', 'PassportController@register');

Route::post('/table', 'PassportController@createTable');

//Dish Routes
Route::middleware('auth:api')->group(function () {
    Route::post('/dish', 'DishesController@store');
    Route::post('/dish/update', 'DishesController@update');
    Route::post('/dish/update', 'DishesController@update');

});

Route::get('/dishes/{id}', 'DishesController@show');
Route::get('/dish/{id}', 'DishesController@getdish');


//Order Routes
Route::middleware('auth:api')->group(function () {
    Route::post('/order/status', 'OrdersController@updateOrderStatus');
      Route::get('/orders', 'OrdersController@index');
    Route::get('/order/{id}', 'OrdersController@show');
    Route::post('/order/create', 'OrdersController@store');

});



Route::get('brands','HomeController@getbrands');

Route::get('firebase','FirebaseController@index');

Route::get('firebase-get-data', 'FirebaseController@getData');