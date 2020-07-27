<?php

use Illuminate\Support\Facades\Route;





Route::prefix('admin')->group(function () {
    Route::get('test', "Admin\AdminController@index");

    //Product
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


    //Package
    Route::get('package', "Admin\PackageController@index")->name('package.index');
    Route::get('packageCreate', "Admin\PackageController@create");
    Route::post('packageStore', "Admin\PackageController@store")->name('packageStore');
    Route::get('packageEdit/{id}','Admin\PackageController@edit')->name('packageEdit');
    Route::get('packageDelete/{id}','Admin\PackageController@destroy')->name('packageDelete');
    Route::post('packageUpdate/{id}', "Admin\PackageController@update")->name('packageUpdate');


    //Package
    Route::get('order', "Admin\OrderController@index")->name('order.index');
    Route::post('orderUpdate','Admin\OrderController@update')->name('orderUpdate');

    //paymentMethod
    Route::get('paymentMethod', "Admin\PaymentMethodController@index")->name('paymentMethod.index');
    Route::get('paymentMethodCreate', "Admin\PaymentMethodController@create");
    Route::post('paymentMethodStore', "Admin\PaymentMethodController@store")->name('paymentMethodStore');
    Route::get('paymentMethodEdit/{id}','Admin\PaymentMethodController@edit')->name('paymentMethodEdit');
    Route::get('paymentMethodDelete/{id}','Admin\PaymentMethodController@destroy')->name('paymentMethodDelete');
    Route::post('paymentMethodUpdate/{id}', "Admin\PaymentMethodController@update")->name('paymentMethodUpdate');
});