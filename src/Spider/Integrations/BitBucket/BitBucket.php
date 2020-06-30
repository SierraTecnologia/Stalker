<?php

namespace Finder\Spider\Integrations\BitBucket;

use Illuminate\Database\Eloquent\Model;
use Log;
use Finder\Spider\Integrations\Integration;

class BitBucket extends Integration
{
    public static $ID = 29;

    // protected function getConnection($token = false)
    // {
    //     return new Cloudflare\API\Adapter\Guzzle(new APIKey('user@example.com', 'apiKey'));
    // }
}
