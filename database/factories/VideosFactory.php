<?php

use Faker\Generator as Faker;
use Stalker\Models\Video;

$factory->define(Stalker\Models\Video::class, function (Faker $faker) {

    $mediaService = new \Stalker\Services\MediaService();
    $files = $mediaService->allFiles();
    $randomFile = array_rand($files, 1);

    return [
        'name' => $files[$randomFile]['name'],
        'url' => $files[$randomFile]['path'],
        'path' => $files[$randomFile]['relative_path'],
        'type' => $files[$randomFile]['type'],
        'filename' => $files[$randomFile]['filename'],
        'size' => $files[$randomFile]['size'],
        'last_modified' => $files[$randomFile]['last_modified'],
    ];
});