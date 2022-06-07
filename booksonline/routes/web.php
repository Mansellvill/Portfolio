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

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);

Route::middleware(['auth'])->group(function() {

    Route::group([
        'namespace' => 'Account',
        'prefix' => 'account',
    ], function() {
        Route::get('/profil', 'AccountController@index')->name('profil.index');
        Route::get('/profil/edit', 'AccountController@edit')->name('profil.edit');
        Route::post('/profil/update', 'AccountController@update')->name('profil.update');
        Route::get('/orders', 'AccountController@orders')->name('profil.orders');
        Route::get('/orders/{order}', 'AccountController@show')->name('profil.order.show');
    });

    Route::group([
        'namespace' => 'Admin',
        'prefix' => 'admin',
    ], function() {
        Route::group(['middleware' => 'is_admin'], function(){
            Route::get('/orders', 'OrderController@index')->name('home');
            Route::get('/orders/{order}', 'OrderController@show')->name('orders-show');
        });
    
        Route::resource('categories', 'CategoryController');
        Route::resource('products', 'ProductController');
        Route::resource('publishers', 'PublisherController');
        Route::resource('authors', 'AuthorController');
    });

});



Route::group([
    'prefix' => 'basket'
],function(){
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');
    Route::group([
        'middleware' => 'basket_not_empty'
    ],function(){
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');
    });

    Route::get('checkout', 'BasketController@basketСheckout')->name('basket-checkout');
    Route::post('confirm', 'BasketController@basketConfirm')->name('basket-confirm');
});


Route::get('/account', 'Auth\LoginController@logout')->name('get-logout');
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');
Route::get('/', 'MainController@index')->name('index');
Route::get('/wishlist', 'MainController@wishlist')->name('wishlist');
Route::post('/search', 'MainController@search')->name('search');
Route::get('/{category}', 'MainController@сategory')->name('category');
Route::get('/{category}/{product}', 'MainController@product')->name('product');

