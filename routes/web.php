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

Route::group( ['middleware' => 'auth' ], function()
{
    //Product mangement
    Route::get('/product-creation', 'ProductsController@create');
    Route::post('/product-creation', 'ProductsController@store');
    Route::get('/products/{product}/edit', 'ProductsController@edit');
    Route::post('/products/{product}/ratings', 'RatingsController@store');

    //User mangement
    Route::get('/users', 'UsersController@show');
    Route::get('/user-update', 'UsersController@update');
    Route::post('/user-update', 'UsersController@store')->name('updateUser');

});



Route::get('/', 'HomeController@index');

Route::get('/products', 'ProductsController@index')->name('home');

Route::get('/products/{product}', 'ProductsController@show');

