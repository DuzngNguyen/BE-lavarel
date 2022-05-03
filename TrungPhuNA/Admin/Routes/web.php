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

Route::get('login.html','Auth\AdminLoginController@index')->name('get_admin.login');
Route::post('login.html','Auth\AdminLoginController@login');

Route::get('forget-password.html','Auth\AdminLoginController@forgetPassword')->name('get_admin.forget_password');
Route::post('forget-password.html','Auth\AdminLoginController@processForgetPassword');
Route::get('user-verification.html','Auth\AdminLoginController@verificationPassword')->name('get_admin.verification_password');
Route::post('user-verification.html','Auth\AdminLoginController@processVerificationPassword');

Route::group(['prefix' => 'laravel-filemanager','middleware' => 'checkLoginAdmin'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::prefix('admin')->middleware(['checkLoginAdmin','log.route'])->group(function() {
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('/', 'AdminController@index')->name('get_admin.index')->middleware('permission:dashboard|full');
    Route::prefix('user')->namespace('User')->group(function (){
        Route::get('/','AdminUserController@index')->name('get_admin.user.index')->middleware('permission:user_index|full');
        Route::get('create','AdminUserController@create')->name('get_admin.user.create')->middleware('permission:user_create|full');
        Route::post('create','AdminUserController@store')->middleware('permission:user_create|full');
        Route::get('modal-add','AdminUserController@modalAdd')->name('get_admin.user.create_modal')->middleware('permission:user_create_modal|full');

        Route::get('update/{id}','AdminUserController@edit')->name('get_admin.user.update')->middleware('permission:user_update|full');
        Route::post('update/{id}','AdminUserController@update')->middleware('permission:user_update|full');
        Route::get('info','AdminUserController@info')->name('get_admin.user.info')->middleware('permission:user_info|full');

        Route::get('delete/{id}','AdminUserController@delete')->name('get_admin.user.delete')->middleware('permission:user_delete|full');
    });
    Route::prefix('contact')->namespace('User')->group(function (){
        Route::get('/','AdminContactController@index')->name('get_admin.contact.index')->middleware('permission:contact_index|full');
        Route::get('delete/{id}','AdminContactController@delete')->name('get_admin.contact.delete')->middleware('permission:contact_delete|full');
    });

    Route::prefix('document')->namespace('Document')->group(function (){
        Route::get('/','AdminDocumentController@index')->name('get_admin.document.index')->middleware('permission:document_index|full');
        Route::get('create','AdminDocumentController@create')->name('get_admin.document.create')->middleware('permission:document_create|full');
        Route::post('create','AdminDocumentController@store')->middleware('permission:document_create|full');

        Route::get('update/{id}','AdminDocumentController@edit')->name('get_admin.document.update')->middleware('permission:document_update|full');
        Route::post('update/{id}','AdminDocumentController@update')->middleware('permission:document_update|full');
        Route::get('delete/{id}','AdminDocumentController@delete')->name('get_admin.document.delete')->middleware('permission:document_delete|full');
    });

        Route::prefix('business-control')->namespace('BusinessControl')->group(function (){
        Route::get('/','AdminSalesController@index')->name('get_admin.business_control.index')->middleware('permission:business_control_index|full');
        Route::get('create','AdminSalesController@create')->name('get_admin.business_control.create')->middleware('permission:business_control_create|full');
        Route::post('create','AdminSalesController@store')->middleware('permission:business_control|full');

        Route::get('update/{id}','AdminSalesController@edit')->name('get_admin.business_control.update')->middleware('permission:business_control_update|full');
        Route::post('update/{id}','AdminSalesController@update')->middleware('permission:business_control_update|full');
        Route::get('delete/{id}','AdminSalesController@delete')->name('get_admin.business_control.delete')->middleware('permission:business_control_delete|full');
    });

    Route::prefix('drive')->group(function (){
        Route::get('/','AdminDriveController@index')->name('get_admin.drive.index')->middleware('permission:drive_index|full');
        Route::get('delete/{id}','AdminDriveController@delete')->name('get_admin.drive.delete')->middleware('permission:drive_delete|full');
    });


    include 'web_setting.php';
    include 'web_ecommerce.php';
    include 'web_blog.php';
    include 'web_acl.php';
    include 'web_revenue.php';

    Route::prefix('profile')->namespace('Profile')->group(function (){
        Route::get('/','AdminProfileController@index')->name('get_admin.profile.index');
        Route::post('update/{id}','AdminProfileController@update')->name('post_admin.profile.update');

        Route::get('update-password','AdminProfileController@getUpdatePassword')->name('get_admin.profile.update_password');
        Route::post('update-password','AdminProfileController@postUpdatePassword');
    });

    Route::get('revenue','AdminStatisticalController@revenue')->name('get_admin.dashboard.revenue');
    Route::get('statistical','AdminStatisticalController@index')->name('get_admin.statistical')->middleware('permission:statistical_index|full');;
    Route::get('logout.html','Auth\AdminLoginController@logout')->name('get_admin.logout');
});
