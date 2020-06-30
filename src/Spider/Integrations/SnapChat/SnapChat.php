<?php

namespace Finder\Spider\Integrations\SnapChat;

use Log;
// use Artista\Models\Digital\Midia\Video;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class SnapChat extends Integration
{
    public static $ID = 18;
    public static $URL = 'https://www.snapchat.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
