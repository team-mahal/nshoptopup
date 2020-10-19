<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    Route::get('/user/{id}', 'Auth\UserController@user');

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

    Route::post('add-wallet/{user_id}', "Admin\SiteController@addWallet");
    Route::post('withdraw-wallet/{user_id}', "Admin\SiteController@withdrawWallet");

    //Product Order
    Route::post('product-order-walllet/{id}/{user_id}', "Admin\SiteController@ProductOrderWithWallet");
    Route::post('product-order-transaction_id/{id}/{user_id}', "Admin\SiteController@ProductOrderWithTransactionId");
    Route::get('check-pandding-order/{user_id}', "Admin\OrderController@checkPanddingOrder");
    Route::post('productOrder/{id}/{user_id}', "Admin\OrderController@store");

    //trxidData
    Route::get('trxidData/{trxid}/{user_id}/{cart_amount}', "Admin\CommonController@getTrxidData");
    Route::post('order-with-wallet/{user_id}/{cart_amount}', "Admin\SiteController@orderWithWallet");
    Route::post('shopOrder/{total}/{user_id}', "Admin\CommonController@shopStore");
    Route::get('transactions-data/{id}', "Admin\TransactionInfoController@getTransaction");
    Route::get('withdraws-data/{id}', "Admin\WithdrawInfoController@getWithdraw");
    Route::post('join/{id}', "MatchController@join");
});

Route::get('sliders', "Admin\SiteController@getSlider");
Route::get('notice', "Admin\NoticeController@show");
Route::get('products', "Admin\ProductController@getProduct");
Route::get('productplayzoon', "Admin\ProductController@productplayzoon");
Route::get('shop-products', "Admin\CommonController@getProduct");
// data api ***
Route::get('product/{id}', "Admin\ProductController@getSingelProduct");
Route::get('shop-product/{id}', "Admin\CommonController@getSingelProduct");
Route::get('packages/{id}', "Admin\PackageController@getProductWiseDataFind");

//invoices-data
Route::get('invoices-data/{id}', "Admin\CommonController@getInvoicesData");
Route::get('invoice-details/{id}/{user_id}', "Admin\CommonController@getInvoiceDetails");
Route::get('transactions/{id}', "Admin\SiteController@getTransactions");
//orders
Route::get('orders-data/{id}', "Admin\CommonController@getOrders");

Route::get('blogs', "Admin\CommonController@getBlog");
Route::get('blog/{id}', "Admin\CommonController@getSingelBlog");
Route::get('all-blog', "Admin\CommonController@getAllBlog");

Route::get('page-data/{id}', "Admin\SiteController@getPageData");
Route::get('matchs/{status}/{id}', "MatchController@index");
Route::get('singlematch/{id}', "MatchController@singlematch");

Route::get('paymentMethods', "Admin\SiteController@getPaymentMethod");


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


    Route::get('gamename/{name}', "Admin\OrderController@gamename");
