<?php

namespace Artista\Pipelines\Finder;

use Support\Contracts\Runners\Stage as StageBase;

class Repository extends StageBase
{
    public function __invoke($payload)
    {
        $this->info('Analisando Repository: '.$payload->getTargetPath());
        
        return $payload;
    }
}