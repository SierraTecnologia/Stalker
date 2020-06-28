<?php
/**
 * Estatisticas Rodadas Diariamente
 */

namespace Artista\Routines\Globals;

use Artista\Routines\Database\SpiderRoutine;

use Artista\Actions\Action;
use Artista\Actions\ActionCollection;
use Artista\Components\Worker\Sync\Database\SpiderCollection;

use Artista\Models\Digital\Infra\Domain;

class SpiderAll extends ActionCollection
{

    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetCounts = 0;
    
    public function prepare()
    {
        // Spider de Todos os Bancos de Dados
        $domains = Domain::all();
        $this->othersTargets = count($domains);
        foreach ($domains as $domain) {
            $spiderRoutine = new SpiderRoutine();
            $spiderRoutine->prepareTargets($domain);
            $this->newAction($spiderRoutine);
        }
        return parent::prepare();
    }

}
