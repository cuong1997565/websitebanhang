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

Route::get('/','FrontendController@getHome');
Route::get('detail/{id}/{slug}.html','FrontendController@getDetail');
Route::get('category/{id}/{slug}.html','FrontendController@getCategory');
Route::post('category/{id}','FrontendController@postComment')->name('postcomment');
Route::get('search','FrontendController@getSearch');

Route::group(['prefix' => 'cart'], function () {
    Route::get('add/{id}','CartController@getAddCart')->name('cart_add');
    Route::get('show','CartController@getShowCart');
    Route::get('delete/{id}','CartController@removeCart');
    Route::get('update','CartController@getUpdateCart');
    Route::post('show','CartController@postComplete');
});

Route::get('complete','CartController@getComplete');

Route::group(['prefix' => 'admin'], function () {
    Route::group(['prefix' => 'login','middleware' => 'CheckLogedIn'], function () {
        Route::get('/', 'LoginController@getLogin');
        Route::post('/', 'LoginController@postLogin');
    });
    Route::get('logout', 'HomeController@getLogout');
    Route::group(['prefix' => 'admin-backend','middleware' => 'CheckLogedOut'], function () {
        Route::get('home','HomeController@getHome')->name('home');
        Route::group(['prefix' => 'category'], function () {
            Route::get('/','CategoryController@getCate')->name('list_cate');
            Route::post('/','CategoryController@postCate');
            Route::get('edit/{id}','CategoryController@getEditCate')->name('edit_cate');
            Route::post('edit/{id}','CategoryController@postEditCate');
            Route::get('delete/{id}','CategoryController@getDeleteCate')->name('delete_cate');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/','ProductController@getProduct')->name('list_product');
            Route::get('add','ProductController@getAddProduct')->name('add_product');
            Route::post('add','ProductController@postAddProduct');
            Route::get('edit/{id}','ProductController@getEditProduct')->name('edit_product');
            Route::post('edit/{id}','ProductController@postEditProduct');
            Route::get('delete/{id}','ProductController@getDeleteProduct')->name('delete_product');
        });
    });
});