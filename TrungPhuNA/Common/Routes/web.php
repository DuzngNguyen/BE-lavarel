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

Route::prefix('common')->group(function() {
    Route::get('/', 'CommonController@index');
    Route::get('email', function (){
        $user = \App\Models\User::first();
        dispatch(new \TrungPhuNA\User\Jobs\User\SendEmailRestartPasswordJob($user));
        return view('common::email.user.password_reset');
//        return view('common::layouts.master');
    });

    Route::get('test', 'CommonController@test');
});
