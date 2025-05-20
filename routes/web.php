<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\web'], function () {

    #BRANDS
    Route::group(
        [
            'prefix' => '/brands',
            'as' => 'brands.',
        ],
        function () {
            Route::get('/', 'WebBrandsController@index')->name('index');
        }
    );
});
