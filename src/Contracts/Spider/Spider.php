<?php
namespace Artista\Contracts\Spider;

use Artista\Logic\Output\AbstractOutput;
use Artista\Logic\Output\Filter\OutputFilterInterface;
use Artista\Logic\Output\TriggerableInterface;

use Symfony\Component\Finder\Finder;

use Artista\Spider\File;
use Artista\Spider\Directory;
use Artista\Spider\Registrator\FileRegistrator;
use Artista\Spider\Metrics\FileMetric;

use Support\Helps\DebugHelper;
use Support\Helps\CodeFileHelper;

/**
 * Run all script analysers and outputs their result.
 */
abstract class Spider extends TargetManager
{
    protected $registrator = false;
    protected $metrics = false;

    public function __construct($target, $parent = false)
    {
        parent::__construct($target, $parent);
        
        $this->registrator = new FileRegistrator($this->getTarget(), $this->getParent());
        $this->setMetric();

        if ($this->getParent()) {
            $this->getMetric()->registerMetricCount('Targets', CodeFileHelper::getClassName($this));
        }
    }

    public function getMetric()
    {
        return $this->metrics;
    }

    public function setMetric($metricClass = false)
    {
        if (!$metricClass) {
            $metricClass = new FileMetric($this->getTarget(), $this->getParent());
        }
        $this->metrics = $metricClass;
    }

    public function run()
    {
        $this->analyse();
    }

    public function followChildrens($finder)
    {
        // check if there are any search results
        if (!$finder->hasResults()) {
            DebugHelper::info('No Results: '.$this->getTargetPath());

            return true;
        }

        foreach ($finder as $file) {
            if ($file->getType() == 'file') {
                $newSpider = new File($file, $this);
            } else {
                $newSpider = new Directory($file, $this);
            }
            $newSpider->run();

            $this->getMetric()->mergeWith(
                $newSpider->getMetric()->saveAndReturnArray()
            );
        }

        if (!$this->getParent()) {
            dd($this->getMetric()->returnMetrics());
        }

        return true;
    }
}