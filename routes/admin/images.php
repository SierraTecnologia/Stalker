<?php
/**
 * Admin
 */
/*
|--------------------------------------------------------------------------
| Images
|--------------------------------------------------------------------------
*/

Route::resource('images', 'ImagesController', ['except' => ['show']]);
Route::post('images/search', 'ImagesController@search');
Route::post('images/upload', 'ImagesController@upload');

/*
|--------------------------------------------------------------------------
| Files
|--------------------------------------------------------------------------
*/

Route::get('files/remove/{id}', 'FilesController@remove');
Route::post('files/upload', 'FilesController@upload');
Route::post('files/search', 'FilesController@search');

Route::resource('files', 'FilesController', ['except' => ['show']]);
