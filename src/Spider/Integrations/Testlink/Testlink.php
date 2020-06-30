<?php
/**
 * Integração com o Test Link.
 * 
 * Equipe de Qa
 */

namespace Finder\Spider\Integrations\Testlink;

use Illuminate\Database\Eloquent\Model;
use Log;
use App\Models\User;
use Finder\Spider\Integrations\Integration;

class Testlink extends Integration
{
    public static $ID = 19;
    protected function getConnection($token = false)
    {
        $token = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
        return new Testlink($token);
    }
}
