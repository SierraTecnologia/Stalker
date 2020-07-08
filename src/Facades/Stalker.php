<?php

namespace Stalker\Facades;

use Illuminate\Support\Facades\Facade;

class Stalker extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'stalker';
    }
}
