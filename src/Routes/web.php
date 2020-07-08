<?php

Route::group(
    ['middleware' => ['web']], function () {

        Route::prefix('finder')->group(
            function () {
                Route::group(
                    ['as' => 'finder.'], function () {

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