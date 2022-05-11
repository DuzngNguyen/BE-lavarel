<?php

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

//Route::middleware('auth:api')->get('/', function (Request $request) {
//    return $request->user();
//});

Route::get('user', 'ApiUserController@user')->middleware('auth:api');

Route::prefix('products')->middleware('cors')->group(function () {
    Route::get('', 'ApiProductController@index');
    Route::get('show/{id}', 'ApiProductController@show');
    Route::get('{slug}', 'ApiProductController@getProductBySlug');
});

Route::prefix('auth')->group(function () {
    Route::post('login', 'ApiLoginController@login');
    Route::post('register', 'ApiRegisterController@register');
});

Route::prefix('cart')->middleware('cors','auth:api')->group(function () {
    Route::post('add', 'ApiShoppingCartController@index');
    Route::post('save', 'ApiShoppingCartController@saveShopping');
    Route::get('list', 'ApiShoppingCartController@listsTransactions');
});

Route::prefix('contact')->middleware('cors')->group(function () {
    Route::post('store', 'ApiContactController@store');
});

Route::apiResource('categories', 'ApiCategoryController')->only(['index']);;
Route::prefix('categories')->group(function () {
    Route::get('{slug}', 'ApiCategoryController@getCategoryBySlug');
});

Route::apiResource('transaction', 'ApiTransactionController')->middleware('auth:api');

