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

use Illuminate\Support\Facades\Route;

Route::prefix('product')->group(function() {
    Route::get('/','ProductController@index')->name('product');
    Route::post('/','ProductController@store')->name('store');
    Route::get('/create','ProductController@create');
    Route::get('/{product}','ProductController@show');
    Route::delete('/{product}','ProductController@destroy');
    Route::get('/edit/{product}','ProductController@edit');
    Route::put('/{product}','ProductController@update');
});
