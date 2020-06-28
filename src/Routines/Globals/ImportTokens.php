<?php
/**
 * Estatisticas Rodadas Diariamente
 */

namespace Artista\Routines\Globals;

use Artista\Routines\Tokens\ImportRoutine;

use Artista\Actions\Action;
use Artista\Actions\ActionCollection;
use Population\Models\Components\Integrations\Token;
use Population\Models\Components\Integrations\TokenAccess;

class ImportTokens extends ActionCollection
{

    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetCounts = 0;
    
    public function prepare()
    {
        // Import de Todos os Bancos de Dados
        $tokens = Token::all();
        $this->othersTargets = count($tokens);
        
        foreach ($tokens as $token) {
            $importRoutine = new ImportRoutine($this->output);
            $importRoutine->prepareTargets($token);
            $this->newActionCollection($importRoutine);
        }
        return parent::prepare();
    }

}
