<?php

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

Route::get('/product-creation', 'ProductsController@create');
Route::post('/product-creation', 'ProductsController@store');
Route::get('/products/{product}/edit', 'ProductsController@edit');
Route::post('/products/{product}/ratings', 'RatingsController@store');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products', 'ProductsController@index');

Route::get('/products/{product}', 'ProductsController@show');

