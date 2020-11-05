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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/order', 'AdminOrderController@index')->name('admin.order');
    Route::get('/location', 'AdminLocationController@index')->name('admin.location');
    Route::get('/payment-history', 'AdminPaymentHistoryController@index')->name('admin.payment_history');
    Route::get('/payment-history', 'AdminAddressController@index')->name('admin.user_address');

});
