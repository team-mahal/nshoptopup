<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', 'Auth\UserController@current');

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');
});


    Route::get('products', "Admin\ProductController@getProduct");
    Route::get('shop-products', "Admin\CommonController@getProduct");
    Route::post('shopOrder/{total}/{user_id}', "Admin\CommonController@shopStore");
    // data api ***
    Route::get('product/{id}', "Admin\ProductController@getSingelProduct");
    Route::get('shop-product/{id}', "Admin\CommonController@getSingelProduct");
    Route::get('packages/{id}', "Admin\PackageController@getProductWiseDataFind");
    Route::post('productOrder/{id}/{user_id}', "Admin\OrderController@store");

    //invoices-data
    Route::get('invoices-data/{id}', "Admin\CommonController@getInvoicesData");
    Route::get('invoice-details/{id}/{user_id}', "Admin\CommonController@getInvoiceDetails");

    //orders
    Route::get('orders-data/{id}', "Admin\CommonController@getOrders");

    Route::get('blogs', "Admin\CommonController@getBlog");
    Route::get('blog/{id}', "Admin\CommonController@getSingelBlog");
    Route::get('all-blog', "Admin\CommonController@getAllBlog");


    //trxidData
    Route::get('trxidData/{trxid}', "Admin\CommonController@getTrxidData");
    

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});
