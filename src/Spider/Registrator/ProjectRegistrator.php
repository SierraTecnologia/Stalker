<?php
namespace Artista\Spider\Registrator;

use Artista\Contracts\Spider\TargetManager;

use Artista\Models\Digital\Midia\Project;

/**
 * Run all script analysers and outputs their result.
 */
class ProjectRegistrator extends TargetManager
{

    public function __construct($target, $parent = false)
    {
        parent::__construct($target, $parent);

        if (!Project::where('location', $this->getLocation())->first()) {
            Project::create($this->getArray());
        }
    }

    protected function getArray()
    {
        
    }

    public function registerAndReturnProject()
    {

    }
}