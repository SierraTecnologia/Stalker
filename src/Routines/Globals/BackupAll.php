<?php
/**
 * Estatisticas Rodadas Diariamente
 */

namespace Artista\Routines\Globals;

use Artista\Routines\Database\BackupRoutine;

use Artista\Actions\Action;
use Artista\Actions\ActionCollection;
use Artista\Components\Worker\Sync\Database\BackupCollection;

use Artista\Models\Digital\Infra\Database;
use Artista\Models\Digital\Infra\DatabaseCollection;

class BackupAll extends ActionCollection
{

    /**
     * Avisa se precisa de Alvos Externos ou nao e descreve eles
     */
    public $externalTargetCounts = 0;
    
    public function prepare()
    {
        // Backup de Todos os Bancos de Dados
        $databaseCollections = DatabaseCollection::all();
        $this->othersTargets = count($databaseCollections);
        foreach ($databaseCollections as $databaseCollection) {
            $backupRoutine = new BackupRoutine();
            $backupRoutine->prepareTargets($databaseCollection);
            $this->newAction($backupRoutine);
        }
        return parent::prepare();
    }

}
