<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/24/21 .
 * Time: 9:47 AM .
 */

Route::prefix('setting')->namespace('Setting')->group( function (){
    Route::get('', 'AdminSettingController@index')->name('get_admin.setting.index')->middleware('permission:setting_list|full');
    Route::get('email', 'AdminEmailController@index')->name('get_admin.setting.email');
    Route::post('email', 'AdminEmailController@store')->name('get_admin.setting.email.store');
});

Route::prefix('account')->namespace('Setting')->group( function (){
    Route::get('/','AdminAccountController@index')->name('get_admin.account.index');
    Route::get('create','AdminAccountController@create')->name('get_admin.account.create');
    Route::post('create','AdminAccountController@store');

    Route::get('update/{id}','AdminAccountController@edit')->name('get_admin.account.update');
    Route::post('update/{id}','AdminAccountController@update');

    Route::get('delete/{id}','AdminAccountController@delete')->name('get_admin.account.delete');
});

Route::prefix('slide')->namespace('Setting')->group( function (){
    Route::get('/','AdminSlideController@index')->name('get_admin.slide.index');
    Route::get('create','AdminSlideController@create')->name('get_admin.slide.create');
    Route::post('create','AdminSlideController@store');

    Route::get('update/{id}','AdminSlideController@edit')->name('get_admin.slide.update');
    Route::post('update/{id}','AdminSlideController@update');

    Route::get('delete/{id}','AdminSlideController@delete')->name('get_admin.slide.delete');
});
Route::prefix('embed')->namespace('Setting')->group( function (){
    Route::get('/','AdminSettingEmbedCodeController@index')->name('get_admin.embed.index');
    Route::get('create','AdminSettingEmbedCodeController@create')->name('get_admin.embed.create');
    Route::post('create','AdminSettingEmbedCodeController@store');

    Route::get('update/{id}','AdminSettingEmbedCodeController@edit')->name('get_admin.embed.update');
    Route::post('update/{id}','AdminSettingEmbedCodeController@update');

    Route::get('delete/{id}','AdminSettingEmbedCodeController@delete')->name('get_admin.embed.delete');
});
Route::prefix('page')->namespace('Setting')->group( function (){
    Route::get('/','AdminPageController@index')->name('get_admin.page.index');
    Route::get('create','AdminPageController@create')->name('get_admin.page.create');
    Route::post('create','AdminPageController@store');

    Route::get('update/{id}','AdminPageController@edit')->name('get_admin.page.update');
    Route::post('update/{id}','AdminPageController@update');

    Route::get('delete/{id}','AdminPageController@delete')->name('get_admin.page.delete');
});
Route::prefix('nav')->namespace('Setting')->group( function (){
    Route::get('/','AdminNavController@index')->name('get_admin.nav.index');
    Route::get('create','AdminNavController@create')->name('get_admin.nav.create');
    Route::post('create','AdminNavController@store');

    Route::get('update/{id}','AdminNavController@edit')->name('get_admin.nav.update');
    Route::post('update/{id}','AdminNavController@update');

    Route::get('delete/{id}','AdminNavController@delete')->name('get_admin.nav.delete');
    Route::get('type/{id}','AdminNavController@loadType')->name('get_admin.nav.type');
    Route::get('update-sort','AdminNavController@updateSort')->name('get_admin.nav.update_sort');
});

Route::prefix('sidebar')->namespace('Setting')->group( function (){
    Route::get('/','AdminSettingSidebarController@index')->name('get_admin.sidebar.index')->middleware('permission:sidebar_list|full');;
    Route::get('create','AdminSettingSidebarController@create')->name('get_admin.sidebar.create')->middleware('permission:sidebar_create|full');;
    Route::post('create','AdminSettingSidebarController@store')->middleware('permission:sidebar_create|full');;

    Route::get('update/{id}','AdminSettingSidebarController@edit')->name('get_admin.sidebar.update')->middleware('permission:sidebar_update|full');;
    Route::post('update/{id}','AdminSettingSidebarController@update')->middleware('permission:sidebar_update|full');;

    Route::get('delete/{id}','AdminSettingSidebarController@delete')->name('get_admin.sidebar.delete')->middleware('permission:sidebar_delete|full');;
    Route::get('update-sort','AdminSettingSidebarController@updateSort')->name('get_admin.sidebar.update_sort')->middleware('permission:sidebar_sort|full');;
});
Route::prefix('general')->namespace('Setting')->group( function (){
    Route::get('/','AdminSettingGeneralController@index')->name('get_admin.general.index');
    Route::get('create','AdminSettingGeneralController@create')->name('get_admin.general.create');
    Route::post('create','AdminSettingGeneralController@store')->name('get_admin.general.store');
});
Route::prefix('logs-request')->namespace('Setting')->group( function (){
    Route::get('/','AdminLogRequestController@index')->name('get_admin.log_request.index');
    Route::get('show/{id}','AdminLogRequestController@show')->name('get_admin.log_request.show');
    Route::get('delete/{id}','AdminLogRequestController@delete')->name('get_admin.log_request.delete');
});
