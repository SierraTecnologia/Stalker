<?php

namespace Artista\Components\Pipelines\Readables;

use League\Pipeline\Pipeline as PipelineBase;
use League\Pipeline\StageInterface;
use SiObjects\Entitys\Components\Pipeline as PipelineComponent;

use Finder\Routines\Contracts\Registrator;
use Finder\Routines\Contracts\Notificator;

class ArticleCreateStage implements StageInterface
{
    public function __invoke(/*PipelineComponent*/ $payload)
    {
        $payload->executeForEachComponent(
            function ($component) {
                Article::create(
                    [
                    'title' => $component->getTitle(),
                    'content' => $component->getContent(),
                    'fonte' => $component->getFonte(),
                    ]
                );
            }
        );
        return $payload;
    }
}
