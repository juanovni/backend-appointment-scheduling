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
            Route::post('store/', 'WebBrandsController@store')->name('store');
            Route::get('edit/{brand}', 'WebBrandsController@edit')->name('edit');
            Route::put('/update', 'WebBrandsController@update')->name('update');
        }
    );
});
