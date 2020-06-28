<?php
/**
 * Estatisticas Rodadas Diariamente
 */

namespace Artista\Routines\Tokens;

use Artista\Actions\Action;
use Artista\Actions\ActionCollection;
use Artista\Components\Worker\Sync\Database\ImportCollection;

use Population\Models\Components\Integrations\Token;

class ImportRoutine extends ActionCollection
{

    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetCounts = 1;
    
    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetZeroClass = Token::class;
    
    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetZeroInstance = false;

    public function prepare()
    {
        if ($this->isPrepared) {
            return true;
        }

        $this->prepareAction();

        return parent::prepare();
    }

    public function execute()
    {
        if (!$this->hasTargets()) {
            return false;
        }

        return parent::execute();
    }

    public function prepareTargets(Token $token)
    {
        $this->externalTargetZeroInstance = $token;
    }

    public function hasTargets()
    {
        if ($this->externalTargetZeroInstance === false) {
            return false;
        }
        return true;
    }
    
    public function prepareAction()
    {
        $stage = 0;
        $action = Action::getActionByCode('importIntegrationToken');
        $this->newAction($action, $stage, 0);
    }

}
