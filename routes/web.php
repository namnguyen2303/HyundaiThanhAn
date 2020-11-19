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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

date_default_timezone_set(DateTimeZone::listIdentifiers(DateTimeZone::ASIA)[27]);

Auth::routes();

Route::group(['namespace' => 'Client', 'as' => 'client.'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('tin-tuc-su-kien', 'PostController@news')->name('news');
    // Route::get('tin-tuc-chi-tiet/', 'PostController@new')->name('new');
    Route::get('lien-he-chung-toi/', 'PostController@contacts')->name('contacts');
    Route::get('ve-chung-toi/', 'PostController@introduce')->name('introduce');
    // Route::get('ve-chung/', 'PostController@product')->name('product');

    Route::get('{slug}', 'PostController@detail')->name('post.detail');
    // Route::get('{slug}', 'PostController@details')->name('post.details');
    Route::get('gioi-thieu/{slug}', 'OverviewController@detail')->name('overview.detail');

    Route::get('san-pham/{category}', 'ProductController@index')->name('product.index');
    Route::get('chi-tiet-san-pham/{slug}', 'ProductController@view')->name('product.view');

    Route::post('add-item', 'ShoppingCartController@addItem')->name('shopping-cart.add-item');
    Route::get('delete-item/{uniqueId}', 'ShoppingCartController@deleteItem')->name('shopping-cart.delete-item');
    Route::get('clear-cart', 'ShoppingCartController@clearCart')->name('shopping-cart.clear-cart');
    Route::post('update-cart', 'ShoppingCartController@update')->name('shopping-cart.update');
    Route::post('booking', 'ShoppingCartController@booking')->name('shopping-cart.booking');
    Route::get('checkout-cart', 'ShoppingCartController@checkout')->name('shopping-cart.checkout');
    Route::post('callback', 'ShoppingCartController@callback')->name('shopping-cart.callback');

    Route::get('about', 'PageController@about')->name('about');
    Route::get('search', 'PageController@search')->name('search');
    Route::match(['post', 'get'], 'ho-t', 'ContactController@contact')->name('contact');

    Route::get('slide', 'SlideController@index')->name('index');
    Route::get('product', 'ProductController1@index')->name('index');
});

// Route::get('destroy-cache', function () {
//     Cache::flush();
//     return redirect()->route('client.home');
// });