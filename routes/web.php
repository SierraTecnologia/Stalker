<?php

Route::group(
    ['middleware' => ['web']], function () {

        Route::prefix('stalker')->group(
            function () {
                Route::group(
                    ['as' => 'stalker.'], function () {

                        /**
                         * 
                         */
                        Route::get('assets', ['uses' => 'BaseController@assets', 'as' => 'assets']);
                        Route::get('medias', 'HomeController@medias')->name('medias');

                        // @todo stalker
                        // // Admin Media
                        Route::group(
                            [
                            'as'     => 'media.',
                            'prefix' => 'media',
                            ], function () {
                                Route::get('medias', 'HomeController@medias')->name('files');
                                        // Route::get('/', ['uses' => 'HomeController@medias',              'as' => 'index']);
                                        // Route::post('files', ['uses' => 'HomeController@medias',              'as' => 'files']);
                                        // Route::post('new_folder', ['uses' => 'HomeController@medias',         'as' => 'new_folder']);
                                        // Route::post('delete_file_folder', ['uses' => 'HomeController@medias', 'as' => 'delete']);
                                        // Route::post('move_file', ['uses' => 'HomeController@medias',          'as' => 'move']);
                                        // Route::post('rename_file', ['uses' => 'HomeController@medias',        'as' => 'rename']);
                                        // Route::post('upload', ['uses' => 'HomeController@medias',             'as' => 'upload']);
                                        // Route::post('crop', ['uses' => 'HomeController@medias',             'as' => 'crop']);
                                Route::get('/', ['uses' => 'MediaController@index',              'as' => 'index']);
                                Route::post('files', ['uses' => 'MediaController@files',              'as' => 'files']);
                                Route::post('new_folder', ['uses' => 'MediaController@new_folder',         'as' => 'new_folder']);
                                Route::post('delete_file_folder', ['uses' => 'MediaController@delete', 'as' => 'delete']);
                                Route::post('move_file', ['uses' => 'MediaController@move',          'as' => 'move']);
                                Route::post('rename_file', ['uses' => 'MediaController@rename',        'as' => 'rename']);
                                Route::post('upload', ['uses' => 'MediaController@upload',             'as' => 'upload']);
                                Route::post('crop', ['uses' => 'MediaController@crop',             'as' => 'crop']);
                            }
                        );

                    }
                );
            }
        );

    }
);