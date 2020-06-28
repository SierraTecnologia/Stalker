<?php

namespace Artista\Spider\Integrations\Xvideos;

use Log;
// use Finder\Models\Digital\Midia\Video;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Xvideos extends Integration
{
    public static $ID = 23;
    public static $URL = 'https://www.xvideos.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
