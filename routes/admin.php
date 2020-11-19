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

Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {
    Route::redirect('/', 'admin/dashboard', \Illuminate\Http\Response::HTTP_PERMANENTLY_REDIRECT);
    Route::get('dashboard', 'DashboroadController@index')->name('dashboard');

    Route::get('products/statistics', 'ProductController@statistics')->name('products.statistics');
    Route::resource('products', 'ProductController');

    Route::get('orders/statistics', 'OrderController@statistics')->name('orders.statistics');
    Route::get('orders/daily', 'OrderController@daily')->name('orders.daily');
    Route::resource('orders', 'OrderController');

    Route::resource('pages', 'PageController');

    Route::resource('langdingpages', 'LangdingPageController');

    Route::get('posts/statistics', 'PostController@statistics')->name('posts.statistics');
    Route::resource('posts', 'PostController');

    Route::get('sim_phone_numbers/statistics', 'SimPhoneNumberController@statistics')->name('sim_phone_numbers.statistics');
    Route::resource('sim_phone_numbers', 'SimPhoneNumberController');

    Route::resource('slides', 'SlideController');
    

    Route::resource('widgets', 'WidgetController');

    Route::resource('collections', 'CollectionController');

    Route::any('system/config-seo-page', 'SystemController@configSeoPage')->name('config.seo-page');
    Route::any('system/ajaxLoadDataSEOPage/{page}', 'SystemController@ajaxLoadDataSEOPage')->name('ajaxLoadDataSEOPage');

    Route::any('system/config-general', 'SystemController@configGeneral')->name('config.general');
});
