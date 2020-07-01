<?php

use Illuminate\Support\Facades\Route;





Route::prefix('admin')->group(function () {
    Route::get('test', "Admin\AdminController@index");
    Route::get('product', "Admin\ProductController@index")->name('product.index');
    Route::get('productCreate', "Admin\ProductController@create");
    Route::post('productStore', "Admin\ProductController@store")->name('productStore');
    Route::get('productEdit/{id}','Admin\ProductController@edit')->name('productEdit');
    Route::get('productDelete/{id}','Admin\ProductController@destroy')->name('productDelete');
    Route::post('productUpdate/{id}', "Admin\ProductController@update")->name('productUpdate');


    // Brand
    Route::get('brand', "Admin\BrandController@index")->name('brand.index');
    Route::get('brandCreate', "Admin\BrandController@create");
    Route::post('brandStore', "Admin\BrandController@store")->name('brandStore');
    Route::get('brandEdit/{id}','Admin\BrandController@edit')->name('brandEdit');
    Route::get('brandDelete/{id}','Admin\BrandController@destroy')->name('brandDelete');
    Route::post('brandUpdate/{id}', "Admin\BrandController@update")->name('brandUpdate');
});