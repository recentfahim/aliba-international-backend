<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::post('/login', 'Api\AuthController@login');
    Route::post('/register', 'Api\AuthController@register');

    Route::get('/users', function (Request $request) {
        return $request->user();
    })->middleware('auth:api');

    Route::get('/category', 'Api\CategoryController@rootCategory');
    Route::get('/sub-category/{category_id}', 'Api\CategoryController@SubCategory');
    Route::get('/product', 'Api\ProductController@BatchSearchItemsFrame');
    Route::get('/brand', 'Api\BrandController@rootBrand');
    Route::get('/single-product/{id}', 'Api\ProductController@BatchGetItemFullInfo');
    Route::get('/banners', 'Api\BannerController@GetBanners');
    Route::get('/home-product', 'Api\HomeProductController@GetFeatureProduct');
    Route::get('/top-product', 'Api\ProductController@TopProduct');
    Route::get('/top-selection-new-arrival', 'Api\ProductController@TopSelection');

});
