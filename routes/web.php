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
Route::group(['namespace' => 'front'], function () {
route::get('/','ProductController@index')->name('product.home');
route::get('/addtocart/{id}','CartController@create')->name('cart.addtocart');
route::post('/updatecart/{id}','CartController@update')->name('cart.updatecart');
route::get('/deletecart/{id}','CartController@destroy')->name('cart.delete');
route::get('/checkout','CartController@index')->name('cart.checkout');
});

Route::group(['namespace' => 'admin','prefix' => 'admin'], function () {
    Auth::routes();    
    Route::get('/', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');    
    Route::group(['middleware' => 'is_admin'], function () {
        //routes when admin logged in comes here
        Route::get('/home', 'HomeController@index');
        Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
    });
});