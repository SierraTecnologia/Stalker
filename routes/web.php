<?php

/**
 * Include App Routes
 */
$loadingRoutes = [
    'public',
];

Route::group(
    ['middleware' => ['web']], function () use ($loadingRoutes) {

        // Route::prefix('stalker')->group(
        //     function () use ($loadingRoutes) {
                Route::group(
                    ['as' => 'stalker.'], function () use ($loadingRoutes) {

                        foreach ($loadingRoutes as $loadingRoute) {
                            include dirname(__FILE__) . DIRECTORY_SEPARATOR . "web". DIRECTORY_SEPARATOR . $loadingRoute.".php";
                        }    


                    }
                );
        //     }
        // );

    }
);