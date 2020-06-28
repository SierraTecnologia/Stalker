<?php

namespace Artista\Spider\Integrations\Google;

use Log;
// use Artista\Models\Digital\Midia\Video;
use App\Models\User;
use Artista\Spider\Integrations\Integration;

class Google extends Integration
{
    public static $ID = 6;
    public static $URL = 'https://www.google.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
