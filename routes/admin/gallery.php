<?php


Route::group(
    [
    'as'     => 'gallery.',
    'prefix' => 'gallery',
    ],
    function () {
        Route::get('criar-album', 'UploadController@index')->name('criar-album');
        Route::post('file-upload/upload', 'UploadController@upload')->name('store');




        // Route::group(
        //     [
        //         //'middleware' => 'admin', 'prefix' => 'admin', 'as' => 'admin.',
        //         'namespace' => 'Gallery'
        //     ], function () {
        // Route::get('/home', 'HomeController@index')->name('home');
        Route::get('adm-albuns', 'AdmAlbumController@index')->name('adm-albuns');
        Route::get('carregar-dados-album/{id}', 'AdmAlbumController@carregarDadosAlbum')->name('carregar-dados-album');
        Route::get('apagar-album/{id}', 'AdmAlbumController@apagarAlbum')->name('apagar-album');
        //     }
        // );
    }
);
