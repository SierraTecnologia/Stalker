<?php
namespace Artista\Spider\Identificadores;

use Artista\Logic\Output\AbstractOutput;
use Artista\Logic\Output\Filter\OutputFilterInterface;
use Artista\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;
use Artista\Contracts\Spider\Spider;
use Artista\Models\Digital\Midia\File;
use Artista\Models\Digital\Internet\ComputerFile;

use Artista\Contracts\Spider\IdentificadorManager;

/**
 * Run all script analysers and outputs their result.
 */
class PackageJson extends IdentificadorManager
{

    /**
     * Identificar Group para a Pasta Pai
     */
    public static $groups = [
        \Finder\Spider\Groups\Project::class,
    ];

    /**
     * If is Composer Package
     */
    public function identify()
    {
        if ($this->getFile()->getFilename()!=='package.json') {
            return false;
        }

        return true;
    }

    public function collectDataEstrutura()
    {
        return [
            "author",
        ];
    }
}