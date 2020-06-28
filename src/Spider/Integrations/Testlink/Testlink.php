<?php
/**
 * Integração com o Test Link.
 * 
 * Equipe de Qa
 */

namespace Artista\Spider\Integrations\Testlink;

use Illuminate\Database\Eloquent\Model;
use Log;
use App\Models\User;
use Artista\Spider\Integrations\Integration;

class Testlink extends Integration
{
    public static $ID = 19;
    protected function getConnection($token = false)
    {
        $token = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
        return new Testlink($token);
    }
}
