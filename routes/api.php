<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('/logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['prefix' => 'manage'], function(){
        Route::group(['middleware' => 'admin'], function() {
            Route::group(['prefix' => 'users'] , function() {
                Route::get('/', 'UserController@index');
                Route::get('/{id}', 'UserController@show');
                Route::post('/', 'UserController@store');
                Route::put('/{id}', 'UserController@put');
                Route::delete('/{id}', 'UserController@delete');
            });
            Route::group(['prefix' => 'products'] , function(){
                Route::get('/', 'ProductController@index');
                Route::get('/{id}', 'ProductController@show');
                Route::post('/', 'ProductController@store');
                Route::put('/{id}', 'ProductController@update');
                Route::delete('/{id}', 'ProductController@destroy');
            });
            Route::group(['prefix' => 'categories'] , function(){
                Route::get('/', 'CategoryController@index');
                Route::get('/{id}', 'CategoryController@show');
                Route::post('/', 'CategoryController@store');
                Route::put('/{id}', 'CategoryController@update');
                Route::delete('/{id}', 'CategoryController@destroy');
            });
            Route::group(['prefix' => 'shops'] , function(){
                Route::get('/', 'ShopController@index');
                Route::get('/{id}', 'ShopController@show');
                Route::post('/', 'ShopController@store');
                Route::put('/{id}', 'ShopController@update');
                Route::put('/disable/{id}', 'ShopController@put');
                Route::delete('/{id}', 'ShopController@destroy');
            });
            Route::group(['prefix' => 'images'] , function() {
                Route::get('/{id}', 'ImageController@index');
                Route::get('/specific/{id}', 'ImageController@show');
                Route::post('/', 'ImageController@store');
                Route::put('/{oldUrl}', 'ImageController@update');
                Route::delete('/{url}', 'ImageController@destroy');
            });
        });
    });
});
