<?php

namespace Artista\Spider\Integrations\Pinterest;

use Log;
// use Artista\Models\Digital\Midia\Video;
use App\Models\User;
use Artista\Spider\Integrations\Integration;

class Pinterest extends Integration
{
    public static $ID = 13;
    public static $URL = 'https://www.pinterest.es/pin/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
