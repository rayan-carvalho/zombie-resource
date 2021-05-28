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

|Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/




Route::group(['namespace' => 'Api'],function() {

    //Route::get('categories/{company_id}', 'CategoryController@index')->name('categories.index');
    //Route::get('clients/{company_id}', 'ClientController@index')->name('clients.index');
    //Route::get('providers/{company_id}', 'ProviderController@index')->name('providers.index');
    //Route::get('products/{company_id}', 'ProductController@index')->name('products.index');

    //Route::resource('clients', 'ClientController');
    //Route::resource('providers', 'ProviderController');
    //Route::resource('categories', 'CategoryController');
    //Route::resource('products', 'ProductController');



});
