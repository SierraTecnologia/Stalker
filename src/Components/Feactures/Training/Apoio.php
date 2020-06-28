<?php

namespace Artista\Components\Feactures\Training;

class Apoio
{

    public function plataforms()
    {
        return [
            Finder\Spider\Integrations\Coursera\Coursera::class,
            Finder\Spider\Integrations\Youtube\Youtube::class,
        ];
    }

    public function create()
    {
        return [
            
        ];
    }

    
}