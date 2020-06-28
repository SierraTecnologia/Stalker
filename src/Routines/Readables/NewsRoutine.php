<?php
/**
 * 
 */

namespace Artista\Routines\Readables;

use Log;
use App\Logic\ComponentsPipeline as PipelineComponent;
use Artista\Routines\ArticlePipeline;
use Artista\Routines\Readables\RrsImporterStage;
use Exception;

class NewsRoutine
{

    /**
     * Se byClass nao for false, retorna todas as ações para qualquer tipo de instancia
     */
    public function run()
    {

        $payload = PipelineComponent(Rrs::all());
        $pipeline = ArticlePipeline::getPipeline();
            
        try {
            $pipeline->process($payload);
        } catch(Exception $e) {
            // Handle the exception.
        }

        return true;
    }

}
