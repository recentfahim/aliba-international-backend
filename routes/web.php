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

Route::get('/', 'Admin\AdminLoginController@showAdminLoginForm')->name('login');
Route::post('/login', 'Admin\AdminLoginController@adminLogin')->name('admin.login');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('/order', 'Admin\AdminOrderController@index')->name('admin.order');
    Route::resource('location', 'Admin\AdminLocationController');
    Route::get('/location/create', 'Admin\AdminLocationController@create')->name('admin.location_create');
    Route::post('/location/store', 'Admin\AdminLocationController@store')->name('admin.location_store');
    Route::get('/payment-history', 'Admin\AdminPaymentHistoryController@index')->name('admin.payment_history');
    Route::get('/address', 'Admin\AdminAddressController@index')->name('admin.user_address');
    Route::get('/user', 'Admin\AdminUserController@index')->name('admin.user');
    Route::resource('currency', 'Admin\AdminCurrencyController');
    Route::get('/order-payment', 'Admin\AdminOrderPaymentController@index')->name('admin.order_payment');
    Route::get('/order-product', 'Admin\AdminOrderProductController@index')->name('admin.order_product');
});
