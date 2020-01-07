<?php

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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('/logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'admin'], function() {
        Route::group(['prefix' => 'users'], function() {
            Route::get('/', 'UserController@all');
            Route::get('/{id}', 'UserController@getUser');
            Route::post('/', 'UserController@store');
            Route::put('/{id}', 'UserController@put');
            Route::delete('/{id}', 'UserController@delete');
        });
    });
});

Route::get('/', 'UserController@all');


//// Products permissions
Route::group(['middleware' => 'auth:api'], function(){
   Route::group(['middleware' => 'admin'], function (){
       Route::resource('products','ProductController');
   });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'merchant'], function (){
        Route::resource('products','ProductController');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'customer'], function (){
        Route::resource('products','ProductController',['only' => [
            'show',
            'index'
        ]]);
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'employee'], function (){
        Route::resource('products','ProductController',['except' => [
            'destroy'
        ]]);
    });
});

///// Categories permissions
Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'admin'], function (){
        Route::resource('categories','CategoryController');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'merchant'], function (){
        Route::resource('categories','CategoryController');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'customer'], function (){
        Route::resource('categories','CategoryController',['only' => [
            'show',
            'index'
        ]]);
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::group(['middleware' => 'employee'], function (){
        Route::resource('categories','CategoryController',['except' => [
            'destroy'
        ]]);
    });
});