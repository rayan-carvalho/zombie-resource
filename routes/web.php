<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::group([
    'middleware'  => ['auth'],
    'namespace'   =>  'Admin',
    'prefix'      =>  'app'
   ],function() {

    Route::resource('home', 'HomeController');
    Route::resource('clients', 'ClientController');
    Route::resource('resources', 'ResourceController');
    Route::resource('categories', 'CategoryController');
    Route::resource('sales', 'SaleController');
});




