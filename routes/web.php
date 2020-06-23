<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);


Route::get('/logout','Auth\LoginController@logout')->name('get-logout');
Route::group([
    'middleware'=> 'auth',
    'namespace'=> 'Admin',
    'prefix'=> 'admin',
],
    function (){
    Route::group([
        'middleware'=> 'is_admin'],
        function (){
        Route::get('/orders', 'OrderController@index')->name('home');
    });

    Route::resource('categories','CategoryController');
    Route::resource('products','ProductController');
});



Route::group([
    'middleware'=> 'basket_not_empty',
    'prefix'=> 'basket',
],function (){
    Route::get('/','BasketController@basket')->name('basket');
    Route::get('/place','BasketController@basketPlace')->name('basket-place');
    Route::post('/place','BasketController@basketConfirm')->name('basket-confirm');


    Route::post('/remove/{id}','BasketController@basketRemove')->name('basket-remove');
});

Route::post('basket/add/{id}','BasketController@basketAdd')->name('basket-add');
Route::get('/','MainController@index')->name('index');
Route::get('/categories','MainController@categories')->name('categories');

Route::get('/{category}','MainController@category')->name('category');
Route::get('/{category}/{product}','MainController@product')->name('product');






