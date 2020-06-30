<?php

namespace Finder\Spider\Integrations\Youtube;

use Log;
// use Finder\Models\Digital\Midia\Video;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Youtube extends Integration
{
    public static $ID = 24;
    public static $URL = 'https://www.youtube.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
