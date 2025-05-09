<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group([
    'prefix' => 'test',
    'as' => 'api.',
], function () {
    Route::get('/', 'ApiHomeController@index')->name('index');
});

Route::group([
    'prefix' => 'brands',
    'as' => 'api.',
], function () {
    Route::get('/', 'ApiBrandController@getAllBrands')->name('index');
});

Route::group([
    'prefix' => 'models',
    'as' => 'api.',
], function () {
    Route::get('/', 'ApiModelsController@getAllModels')->name('index');
    Route::get('brand/{brand}', 'ApiModelsController@getModelsByBrand')->name('models_by_brands');
    Route::post('store/', 'ApiModelsController@store')->name('store');
});

Route::group([
    'prefix' => 'vehicles',
    'as' => 'api.',
], function () {
    Route::post('store/', 'ApiVehicleController@store')->name('store');
    Route::get('plate/{code}', 'ApiVehicleController@getVehicleByPlate')->name('plate');
});

Route::group([
    'prefix' => 'mechanical_workshops',
    'as' => 'api.',
], function () {
    Route::get('/', 'MechanicalWorkshopController@index')->name('index');
});