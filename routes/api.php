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
