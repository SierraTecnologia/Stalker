<?php

namespace Artista\Contracts\Action;

interface Component
{
    public function prepare();
    public function execute();
    public function done();
    public function run();
}