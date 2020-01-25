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

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'admin'], function() {
        Route::group(['prefix' => 'products00'], function() {
            Route::get('/', 'ProductController@index');
            Route::get('/{id}', 'ProductController@show');
            Route::post('/', 'ProductController@store');
            Route::put('/{id}', 'ProductController@update');
            Route::delete('/{id}', 'ProductController@destroy');
        });
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'merchant'], function() {
        Route::group(['prefix' => 'products01'], function() {
            Route::get('/', 'ProductController@index');
            Route::get('/{id}', 'ProductController@show');
            Route::post('/', 'ProductController@store');
            Route::put('/{id}', 'ProductController@update');
            Route::delete('/{id}', 'ProductController@destroy');
        });
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'employee'], function() {
        Route::group(['prefix' => 'products02'], function() {
            Route::get('/', 'ProductController@index');
            Route::get('/{id}', 'ProductController@show');
            Route::post('/', 'ProductController@store');
            Route::put('/{id}', 'ProductController@update');
        });
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'customer'], function() {
        Route::group(['prefix' => 'products03'], function() {
            Route::get('/', 'ProductController@index');
            Route::get('/{id}', 'ProductController@show');
        });
    });
});
///// Categories permissions

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'admin'], function() {
        Route::group(['prefix' => 'categories00'], function() {
            Route::get('/', 'CategoryController@index');
            Route::get('/{id}', 'CategoryController@show');
            Route::post('/', 'CategoryController@store');
            Route::put('/{id}', 'CategoryController@update');
            Route::delete('/{id}', 'CategoryController@destroy');
        });
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'merchant'], function() {
        Route::group(['prefix' => 'categories01'], function() {
            Route::get('/', 'CategoryController@index');
            Route::get('/{id}', 'CategoryController@show');
            Route::post('/', 'CategoryController@store');
            Route::put('/{id}', 'CategoryController@update');
            Route::delete('/{id}', 'CategoryController@destroy');
        });
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'employee'], function() {
        Route::group(['prefix' => 'categories02'], function() {
            Route::get('/', 'CategoryController@index');
            Route::get('/{id}', 'CategoryController@show');
            Route::post('/', 'CategoryController@store');
            Route::put('/{id}', 'CategoryController@update');
        });
    });
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::group(['middleware' => 'customer'], function() {
        Route::group(['prefix' => 'categories03'], function() {
            Route::get('/', 'CategoryController@index');
            Route::get('/{id}', 'CategoryController@show');
        });
    });
});