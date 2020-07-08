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


                    }
                );
            }
        );

    }
);