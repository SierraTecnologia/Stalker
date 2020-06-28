<?php

namespace Artista\Spider\Integrations\Linkedin;

use Log;
// use Artista\Models\Digital\Midia\Video;
use App\Models\User;
use Artista\Spider\Integrations\Integration;

class Linkedin extends Integration
{
    public static $ID = 10;
    public static $URL = 'https://www.linkedin.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
