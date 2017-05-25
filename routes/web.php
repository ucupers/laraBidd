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
    Route::get('/product-creation', 'ProductsController@create')->name('productsCreate');
    Route::post('/product-creation', 'ProductsController@store')->name('productsStore');
    Route::get('/products/{product}/edit', 'ProductsController@edit')->name('productsEdit');
    Route::post('/products/{product}', 'ProductsController@update')->name('productUpdate');
    Route::get('/products/{product}/delete', 'ProductsController@delete')->name('productsDelete');
    Route::post('/products/{product}/ratings', 'RatingsController@store')->name('ratingsStore');

    //Tag management
    Route::post('/tag-store', 'TagsController@store')->name('tagsStore');

    //Bid mangement
    Route::post('/biding/{product}', 'BidsController@store')->name('bidStore');

    //User mangement
    Route::get('/users', 'UsersController@index')->name('usersIndex');
    Route::get('/users/{user}', 'UsersController@show')->name('usersShow');
    Route::get('/users/{user}/edit', 'UsersController@edit')->name('userEdit');
    Route::post('/users/{user}', 'UsersController@store')->name('userStore');

});

//Open routes
Route::get('/', 'ProductsController@index')->name('productsIndex');
Route::post('/', 'ProductsController@search')->name('productsSearch');
Route::get('/products/{product}', 'ProductsController@show')->name('productsShow');
Route::get('/products/tags/{tag}', 'TagsController@index')->name('tagsIndex');

