<?php

namespace Finder\Spider\Integrations\CameraPrive;

use Illuminate\Database\Eloquent\Model;
use Log;
use Finder\Spider\Integrations\Integration;

class CameraPrive extends Integration
{
    public static $ID = 27;

    // protected function getConnection($token = false)
    // {
    //     return new Cloudflare\API\Adapter\Guzzle(new APIKey('user@example.com', 'apiKey'));
    // }
}
