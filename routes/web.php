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

// Route::get('/', function () {
//     return view('welcome');
// });
route::get('/','ProductController@index')->name('home');
route::get('/addtocart/{id}','CartController@create')->name('cart.addtocart');
route::post('/updatecart/{id}','CartController@update')->name('cart.updatecart');
route::get('/deletecart/{id}','CartController@destroy')->name('cart.delete');
route::get('/checkout','CartController@index')->name('cart.checkout');