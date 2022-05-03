<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/27/21 .
 * Time: 12:51 PM .
 */


Route::prefix('role')->namespace('Acl')->group( function (){
    Route::get('/','AdminRoleController@index')->name('get_admin.role.index')->middleware('permission:role_index|full');
    Route::get('create','AdminRoleController@create')->name('get_admin.role.create')->middleware('permission:role_create|full');
    Route::post('create','AdminRoleController@store')->middleware('permission:role_create|full');

    Route::get('update/{id}','AdminRoleController@edit')->name('get_admin.role.update')->middleware('permission:role_update|full');
    Route::post('update/{id}','AdminRoleController@update');

    Route::get('delete/{id}','AdminRoleController@delete')->name('get_admin.role.delete')->middleware('permission:role_delete|full');
});


Route::prefix('permission')->namespace('Acl')->group( function (){
    Route::get('/','AdminPermissionController@index')->name('get_admin.permission.index')->middleware('permission:permission_index|full');
    Route::get('create','AdminPermissionController@create')->name('get_admin.permission.create')->middleware('permission:permission_create|full');
    Route::post('create','AdminPermissionController@store');

    Route::get('update/{id}','AdminPermissionController@edit')->name('get_admin.permission.update')->middleware('permission:permission_update|full');
    Route::post('update/{id}','AdminPermissionController@update');

    Route::get('delete/{id}','AdminPermissionController@delete')->name('get_admin.permission.delete')->middleware('permission:permission_delete|full');
    Route::get('load-all','AdminPermissionController@getLoadPermission')->name('get_admin.permission.load_all')->middleware('permission:permission_load_all|full');
});
