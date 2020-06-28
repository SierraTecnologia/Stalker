<?php
/**
 * Rotinas de Inclusão de Dados
 */

namespace Artista\Logic\Events;

use Artista\Models\Digital\Code\Commit;
use Artista\Models\Digital\Infra\Pipeline;

class NewCommit
{
    public function __construct(Commit $commit)
    {

        // $pipeline = Pipeline::create([

        // ]);

        // Analisa o Commit

        $analyser = $commit;
    }
}
