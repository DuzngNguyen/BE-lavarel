<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/22/21 .
 * Time: 11:37 AM .
 */

Route::prefix('tag')->namespace('Blog')->group(function (){
    Route::get('/','AdminTagController@index')->name('get_admin.tag.index')->middleware('permission:tag_index|full');
    Route::get('create','AdminTagController@create')->name('get_admin.tag.create')->middleware('permission:tag_create|full');
    Route::post('create','AdminTagController@store');

    Route::get('update/{id}','AdminTagController@edit')->name('get_admin.tag.update')->middleware('permission:tag_update|full');
    Route::post('update/{id}','AdminTagController@update');

    Route::get('delete/{id}','AdminTagController@delete')->name('get_admin.tag.delete')->middleware('permission:tag_delete|full');
});
Route::prefix('menu')->namespace('Blog')->group(function (){
    Route::get('/','AdminMenuController@index')->name('get_admin.menu.index')->middleware('permission:menu_index|full');
    Route::get('create','AdminMenuController@create')->name('get_admin.menu.create')->middleware('permission:menu_create|full');
    Route::post('create','AdminMenuController@store');

    Route::get('update/{id}','AdminMenuController@edit')->name('get_admin.menu.update')->middleware('permission:menu_update|full');
    Route::post('update/{id}','AdminMenuController@update');

    Route::get('delete/{id}','AdminMenuController@delete')->name('get_admin.menu.delete')->middleware('permission:menu_delete|full');
});
Route::prefix('article')->namespace('Blog')->group(function (){
    Route::get('/','AdminArticleController@index')->name('get_admin.article.index')->middleware('permission:article_index|full');
    Route::get('create','AdminArticleController@create')->name('get_admin.article.create')->middleware('permission:article_create|full');
    Route::post('create','AdminArticleController@store');

    Route::get('update/{id}','AdminArticleController@edit')->name('get_admin.article.update')->middleware('permission:article_update|full');
    Route::post('update/{id}','AdminArticleController@update');
    Route::get('search','AdminArticleController@search')->name('get_ajax_admin.article.list')->middleware('permission:article_search|full');
    Route::get('delete/{id}','AdminArticleController@delete')->name('get_admin.article.delete')->middleware('permission:article_delete|full');
});
