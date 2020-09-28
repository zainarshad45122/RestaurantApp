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



Auth::routes();

Route::get('/profile', 'AdminController@welcome')->name('profile');

Route::get('/home', 'AdminController@index')->name('home')->middleware('admin');
Route::get('/', 'AdminController@index')->name('welcome')->middleware('admin');
Route::get('/restaurant/details/{id}', 'AdminController@show')->name('details')->middleware('admin');
Route::get('/restaurant/add', 'AdminController@addRestaurant')->middleware('admin');
Route::post('/restaurant/add', 'AdminController@createRestaurant')->middleware('admin');
Route::post('/restaurant/update/{id}', 'AdminController@updateRestaurant')->name('updateRestaurant')->middleware('admin');

Route::get('/all/brands', 'AdminController@allBrands')->middleware('admin');
Route::get('/edit/brand/{id}', 'AdminController@editBrand')->middleware('admin');
Route::post('/update/brand/{id}', 'AdminController@updateBrand')->middleware('admin');
Route::get('/brand/{id}', 'AdminController@brandRestaurants')->middleware('admin');
Route::get('/add/brand', 'AdminController@addBrand')->middleware('admin');
Route::post('/add/brand', 'AdminController@createBrand')->middleware('admin');

Route::get('/orders/{id}', 'AdminController@orders')->middleware('admin');
Route::get('/order/details/{id}', 'AdminController@orderDetails')->middleware('admin');



Route::get('/approved/restaurants', 'AdminController@approvedRestaurants')->middleware('admin');
Route::get('/blocked/restaurants', 'AdminController@blockedRestaurants')->middleware('admin');
Route::get('/inprocessing/restaurants', 'AdminController@inprocessingRestaurants')->middleware('admin');
Route::get('/pending/restaurants', 'AdminController@pendingRestaurants')->middleware('admin');


//Restaurant Status Change Routes
Route::get('/restaurant/approve/{id}', 'AdminController@statusApproved')->middleware('admin');
Route::get('/restaurant/block/{id}', 'AdminController@statusBlocked')->middleware('admin');
Route::get('/restaurant/inprocessing/{id}', 'AdminController@statusInProcessing')->middleware('admin');


Route::get('firebase-get-data', 'FirebaseController@getData');

Route::get('firebase-update-data', 'FirebaseController@updateData');

Route::get('firebase-set-data', 'FirebaseController@index');