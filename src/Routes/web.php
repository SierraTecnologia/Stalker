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

                        /**
                         * 
                         */
                        Route::get('home', 'HomeController@index')->name('home');
                        Route::get('medias', 'HomeController@medias')->name('medias');
                        Route::get('persons', 'HomeController@persons')->name('persons');

                        /**
                         * Track
                         */
                        Route::prefix('track')->group(
                            function () {
                                Route::namespace('Track')->group(
                                    function () {
                                        Route::group(
                                            ['as' => 'track.'], function () {

                                                Route::get('person', 'PersonController@index')->name('person');

                                            }
                                        );
                                    }
                                );
                            }
                        );


                        /**
                         * Actions
                         */
                        Route::prefix('action')->group(
                            function () {
                                Route::namespace('Action')->group(
                                    function () {
                                        Route::group(
                                            ['as' => 'action.'], function () {

                                                Route::resource('actions', 'ActionController');
                                                Route::get('actions/model/{model}', 'ActionController@actionsForModel')->name('actions.model');
                                                Route::get('actions/execute/{modelId}/{actionCod}', 'ActionController@executeAction')->name('actions.execute');

                                            }
                                        );
                                    }
                                );
                            }
                        );


                    }
                );
            }
        );

    }
);