<?php

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

Route::group(['prefix' => 'user', 'namespace' => 'Auth'], function (){
    Route::get('login', 'UserLoginController@getLogin')->name('user_get.login');
    Route::post('login', 'UserLoginController@postLogin')->name('user_get.login');

    Route::get('register', 'UserRegisterController@getRegister')->name('user_get.register');
    Route::post('register', 'UserRegisterController@postRegister');

    Route::get('forget-password','UserForgetPasswordController@getForgetPassword')->name('user_get.forget_password');
    Route::post('forget-password','UserForgetPasswordController@processVerification');
    Route::get('forget-password-success','UserForgetPasswordController@getForgetPasswordSuccess')
        ->name('user_get.forget_password_success');

    Route::get('update-password','UserForgetPasswordController@getUpdatePassword')->name('user_get.update_password');
    Route::post('update-password','UserForgetPasswordController@postUpdatePassword');

    Route::get('verification-account','UserForgetPasswordController@verificationForget')->name('user_get.verification_account');
});

Route::prefix('user')->middleware(['checkLoginUser','log.route'])->group(function() {
    Route::get('/', 'UserController@index')->name('user_get.index');
});
