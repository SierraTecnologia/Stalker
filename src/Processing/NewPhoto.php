<?php

namespace Stalker\Processing;

use App\Models\User;
use FaceDetector;
use Log;
use Stalker\Processing;

class NewPhoto
{
    public function __construct()
    {
    }

    public function actions()
    {
        $facedetect = new FaceDetector();
        $facedetect->faceDetect($_FILES['image']['tmp_name']);
        // $json = $facedetect->toJson();
        // echo $json;
        $facedetect->toJpeg();
    }
}
