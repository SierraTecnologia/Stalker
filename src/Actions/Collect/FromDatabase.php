<?php
/**
 * 
 */

namespace Artista\Actions\Collect;

use Artista\Models\Digital\Bot\Runner;
use Log;
use MathPHP\Functions\Map\Single;

class FromDatabase implements \Finder\Contracts\Action\Robot
{
    /**
     * Array de Array de Actions, o Indice seria o Stage. 
     * 
     * O Stage 2 só começa a ser executado depois que o Stage 1 está completo!
     */
    public $actionsToExecute = [];

    public $actionsActors = [];

    public $runners = [];

    public $paramsToExecute = [];

    public $othersTargets = 0;

    public $actualStage = 0;

    /**
     * Numero de Actions ja Executadas
     */
    public $executedActions = 0;

    protected $isPrepared = false;

    protected $isComplete = false;

    protected function completeRunner($runner)
    {
        $this->executedActions = $this->executedActions+1;
        Log::channel('sitec-finder')->notice('Runner Completada. Concluido:'.$this->getPorcDone());
    }

    public function getActionToExecute()
    {
        return $this->actionsToExecute[$this->actualStage];
    }

    public function getRunners()
    {
        return $this->runners[$this->actualStage];
    }

    public function prepare()
    {
        if ($this->isPrepared) {
            return true;
        }

        if (!isset($this->runners[$this->actualStage])) {
            $this->runners[$this->actualStage] = [];
        }

        $totalActionsCount = 0;
        foreach($this->getActionToExecute() as $indice=>$action) {
            if ($action instanceof ActionCollection) {
                $this->runners[$this->actualStage] = $action->prepare();
            } else {
                $this->runners[$this->actualStage] = (new Runner())->usingAction($action)->usingTarget($this->getActor($this->actionsActors[$this->actualStage][$indice]))->prepare();
            }
            $totalActionsCount = $totalActionsCount + 1;
        }

        $this->isPrepared = true;
        return $this;
    }

    public function execute()
    {
        foreach($this->runners as $indice=>$runner) {
            $this->runners[$indice]->execute();
            $this->completeRunner($runner);
        }
    }

    public function done()
    {
        return $this;
    }

    public function run()
    {
        $this->prepare();
        $this->execute();
        $this->done();
    }

    public function totalStages()
    {
        return count($this->actionsToExecute);
    }

    protected function getActor($number)
    {
        $variableName = 'externalTarget'.$this->getNamberName($number).'Instance';
        return $this->$variableName;
    }

    private function getNamberName($number)
    {
        if ($number == 0 ) {
            return 'Zero';
        }
        if ($number == 1 ) {
            return 'One';
        }
        if ($number == 2 ) {
            return 'Two';
        }
        if ($number == 3 ) {
            return 'Tree';
        }
        return 'I dont now';
    }

    public function getTotalActionsCount()
    {
        $totalActionsCount = 0;
        foreach($this->actionsToExecute as $action) {
            $sumInCount = 1;
            if (method_exists($action, 'getTotalActionsCount')) {
                $sumInCount = $action->getTotalActionsCount();
            }
            $totalActionsCount = $totalActionsCount + $sumInCount;
        }
        return $totalActionsCount;
    }

    public function getTotalTargetsCount()
    {
        return $this->othersTargets + $this->externalTargetCounts;
    }

    public function getPorcDone()
    {
        // (porc * total)/100 = agora
        // porc = agora*100 / total
        return Single::divide(Single::multiply([$this->executedActions], 100), $this->getTotalActionsCount())[0];
    }

    public function newAction($action, int $stage = 0, int $actorNumber = 0)
    {
        $this->actionsToExecute[$stage][] = $action;
        $this->actionsActors[$stage][] = $actorNumber;
    }

    public function includeCollection(ActionCollection $collection, $stage, $action)
    {
        // @todo Fazer
    }

    public function getActionsToExecute()
    {
        return $this->paramsToExecute;   
    }

    public function initProcess()
    {
        
    }
}
