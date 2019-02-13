<?php

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

# Shopify Routes Auth , callback 

Route::get('login/shopify', 'Auth\LoginShopifyController@redirectToProvider');
Route::get('login/shopify/callback', 'Auth\LoginShopifyController@handleProviderCallback');
Route::get('/products', 'HomeController@products')->name('home');
Route::get('/customers', 'HomeController@customers')->name('home');
Route::get('/notify', 'HomeController@notify')->name('home'); 

Route::get('/product-delete', 'HomeController@productDelete');
Route::get('/product-edit', 'HomeController@productUpdate');
Route::post('/product-update', 'HomeController@productUpdatePost');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


