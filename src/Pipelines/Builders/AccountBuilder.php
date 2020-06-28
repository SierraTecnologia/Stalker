<?php

namespace Artista\Pipelines\Builders;

use League\Pipeline\Pipeline;
use League\Pipeline\StageInterface;

use Support\Contracts\Runners\PipelineBuilder;

use Artista\Pipelines\Finder\Account;

class AccountBuilder extends PipelineBuilder
{
    public static function getPipelineWithOutput($output)
    {
        $builder = self::makeWithOutput($output);
        $builder
            ->add(Account::makeWithOutput($builder->getOutput()));

        return $builder->build();
    }
}