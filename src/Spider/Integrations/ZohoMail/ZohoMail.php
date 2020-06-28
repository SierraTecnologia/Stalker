<?php

namespace Artista\Spider\Integrations\ZohoMail;

use Log;
// use Artista\Models\Digital\Midia\Video;
use App\Models\User;
use Artista\Spider\Integrations\Integration;

class ZohoMail extends Integration
{
    /**
     * Proxima é 33, por causa do camera prive e amazon, BitBucket, GitHub, Trello
     * e Coursera
     */
    public static $ID = 26;
    public static $URL = 'https://www.zohomail.com/';

    public function getConnection($organizer = false)
    {
        return false;
    }
}
