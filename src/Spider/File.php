<?php
namespace Artista\Spider;

use Artista\Logic\Output\AbstractOutput;
use Artista\Logic\Output\Filter\OutputFilterInterface;
use Artista\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Artista\Contracts\Spider\Spider;

use Support\Helps\DebugHelper;

/**
 * Run all script analysers and outputs their result.
 */
class File extends Spider
{
    public function analyse()
    {
        $absoluteFilePath = $this->getTargetPath();
        $fileNameWithExtension = $this->target->getRelativePathname();
        
        $class = '\\Finder\\Spider\\Extensions\\'.ucfirst($this->getTarget()->getExtension());
        DebugHelper::info('Analisando Arquivo: '.$this->getTargetPath());
        if (class_exists($class)) {
            $analyse = new $class($this->getTarget(), $this->getMetric());

        }

        // dd($absoluteFilePath, $fileNameWithExtension, $this->target);
        // ...
    }
}