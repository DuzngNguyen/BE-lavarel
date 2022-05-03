<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 1/16/22 .
 * Time: 2:38 PM .
 */


Route::prefix('revenues')->namespace('Expenditure')->group( function (){
    Route::get('/', 'AdminExpenditureController@index')->name('get_admin.revenues.index')->middleware('permission:revenues_list|full');
    Route::get('create', 'AdminExpenditureController@create')->name('get_admin.revenues.create')->middleware('permission:revenues_create|full');
    Route::post('create', 'AdminExpenditureController@store')->middleware('permission:revenues_create|full');

    Route::get('update/{id}','AdminExpenditureController@edit')->name('get_admin.revenues.update')->middleware('permission:revenues_update|full');
    Route::post('update/{id}','AdminExpenditureController@update');

    Route::get('delete/{id}','AdminExpenditureController@delete')->name('get_admin.revenues.delete')->middleware('permission:revenues_delete|full');
});
