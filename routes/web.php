<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'AdminLoginController@showAdminLoginForm')->name('login');
Route::post('/login', 'AdminLoginController@adminLogin')->name('admin.login');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/order', 'AdminOrderController@index')->name('admin.order');
    Route::resource('location', 'AdminLocationController');
    Route::get('/location/create', 'AdminLocationController@create')->name('admin.location_create');
    Route::post('/location/store', 'AdminLocationController@store')->name('admin.location_store');
    Route::get('/payment-history', 'AdminPaymentHistoryController@index')->name('admin.payment_history');
    Route::get('/address', 'AdminAddressController@index')->name('admin.user_address');
    Route::get('/user', 'AdminUserController@index')->name('admin.user');
    Route::resource('currency', 'AdminCurrencyController');
    Route::get('/order-payment', 'AdminOrderPaymentController@index')->name('admin.order_payment');
    Route::get('/order-product', 'AdminOrderProductController@index')->name('admin.order_product');
});
