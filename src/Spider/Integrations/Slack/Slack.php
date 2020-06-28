<?php

namespace Artista\Spider\Integrations\Slack;

use Log;
// use Finder\Models\Digital\Midia\Video;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Slack extends Integration
{
    public static $ID = 17;
    public static $URL = 'https://www.slack.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
