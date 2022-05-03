<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/22/21 .
 * Time: 11:36 AM .
 */
Route::prefix('attribute')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminAttributeController@index')->name('get_admin.attribute.index')->middleware('permission:attribute_index|full');
    Route::get('create','AdminAttributeController@create')->name('get_admin.attribute.create')->middleware('permission:attribute_create|full');
    Route::post('create','AdminAttributeController@store');

    Route::get('update/{id}','AdminAttributeController@edit')->name('get_admin.attribute.update')->middleware('permission:attribute_update|full');
    Route::post('update/{id}','AdminAttributeController@update');

    Route::get('delete/{id}','AdminAttributeController@delete')->name('get_admin.attribute.delete')->middleware('permission:attribute_delete|full');
});

Route::prefix('keyword')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminKeywordController@index')->name('get_admin.keyword.index')->middleware('permission:keyword_index|full');
    Route::get('create','AdminKeywordController@create')->name('get_admin.keyword.create')->middleware('permission:keyword_create|full');
    Route::post('create','AdminKeywordController@store');

    Route::get('update/{id}','AdminKeywordController@edit')->name('get_admin.keyword.update')->middleware('permission:keyword_update|full');
    Route::post('update/{id}','AdminKeywordController@update');

    Route::get('delete/{id}','AdminKeywordController@delete')->name('get_admin.keyword.delete')->middleware('permission:keyword_delete|full');
});
Route::prefix('category')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminCategoryController@index')->name('get_admin.category.index')->middleware('permission:user_index|full');
    Route::get('create','AdminCategoryController@create')->name('get_admin.category.create')->middleware('permission:user_index|full');
    Route::post('create','AdminCategoryController@store');

    Route::get('update/{id}','AdminCategoryController@edit')->name('get_admin.category.update')->middleware('permission:user_index|full');
    Route::post('update/{id}','AdminCategoryController@update');

    Route::get('delete/{id}','AdminCategoryController@delete')->name('get_admin.category.delete')->middleware('permission:user_index|full');
});
Route::prefix('type')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminProductTypeController@index')->name('get_admin.type.index')->middleware('permission:type_index|full');
    Route::get('create','AdminProductTypeController@create')->name('get_admin.type.create')->middleware('permission:type_create|full');
    Route::post('create','AdminProductTypeController@store');

    Route::get('update/{id}','AdminProductTypeController@edit')->name('get_admin.type.update')->middleware('permission:type_update|full');
    Route::post('update/{id}','AdminProductTypeController@update');

    Route::get('delete/{id}','AdminProductTypeController@delete')->name('get_admin.type.delete')->middleware('permission:type_delete|full');
});
Route::prefix('product')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminProductController@index')->name('get_admin.product.index')->middleware('permission:product_index|full');
    Route::get('create','AdminProductController@create')->name('get_admin.product.create')->middleware('permission:product_create|full');
    Route::post('create','AdminProductController@store');

    Route::get('update/{id}','AdminProductController@edit')->name('get_admin.product.update')->middleware('permission:product_update|full');
    Route::post('update/{id}','AdminProductController@update');

    Route::get('delete/{id}','AdminProductController@delete')->name('get_admin.product.delete')->middleware('permission:product_delete|full');
    Route::get('delete-image/{id}','AdminProductController@deleteImage')->name('get_admin.product.delete_image')->middleware('permission:product_delete_image|full');
    Route::get('search','AdminProductController@searchProduct')->name('get_ajax_admin.product.list')->middleware('permission:product_search|full');
    Route::get('info','AdminProductController@info')->name('get_admin.product.info')->middleware('permission:product_info|full');
});

Route::prefix('product-item')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminProductItemController@index')->name('get_admin.product_item.index')->middleware('permission:product_item_index|full');
    Route::get('create','AdminProductItemController@create')->name('get_admin.product_item.create')->middleware('permission:product_item_create|full');
    Route::post('create','AdminProductItemController@store');

    Route::get('update/{id}','AdminProductItemController@edit')->name('get_admin.product_item.update')->middleware('permission:product_item_update|full');
    Route::post('update/{id}','AdminProductItemController@update');

    Route::get('delete/{id}','AdminProductItemController@delete')->name('get_admin.product_item.delete')->middleware('permission:product_item_delete|full');
});
Route::prefix('file')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminFileController@index')->name('get_admin.file.index')->middleware('permission:file_index|full');
    Route::get('create','AdminFileController@create')->name('get_admin.file.create')->middleware('permission:file_create|full');
    Route::post('create','AdminFileController@store');

    Route::get('update/{id}','AdminFileController@edit')->name('get_admin.file.update')->middleware('permission:file_update|full');
    Route::post('update/{id}','AdminFileController@update');

    Route::get('delete/{id}','AdminFileController@delete')->name('get_admin.file.delete')->middleware('permission:file_delete|full');
});
Route::prefix('transaction')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminTransactionController@index')->name('get_admin.transaction.index')->middleware('permission:transaction_index|full');
    Route::get('create','AdminTransactionController@create')->name('get_admin.transaction.create')->middleware('permission:transaction_create|full');
    Route::post('create','AdminTransactionController@store');

    Route::get('update/{id}','AdminTransactionController@edit')->name('get_admin.transaction.update')->middleware('permission:transaction_update|full');
    Route::post('update/{id}','AdminTransactionController@update');

    Route::get('import','AdminTransactionController@import')->name('get_admin.transaction.import')->middleware('permission:transaction_import|full');
    Route::post('import','AdminTransactionController@postImport')->name('get_admin.transaction.import_post');

    Route::get('delete/{id}','AdminTransactionController@delete')->name('get_admin.transaction.delete')->middleware('permission:transaction_delete|full');
    Route::post('deletes','AdminTransactionController@deletes')->name('get_admin.transaction.deletes')->middleware('permission:transaction_deletes|full');
});

Route::prefix('export')->namespace('Ecommerce')->group(function (){
    Route::get('/','AdminExportController@index')->name('get_admin.export.index')->middleware('permission:export_index|full');
});
