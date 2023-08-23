<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'Api\AuthController@login')->name('api.login');

Route::post('register', 'Api\AuthController@register')->name('api.register');

Route::middleware('auth:sanctum')->group( function () {
   Route::post('products/import', 'Api\ProductController@import')->name('api.products.import');
});
