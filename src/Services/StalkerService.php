<?php
/**
 * Serviço referente a linha no banco de dados
 */

namespace Stalker\Services;

/**
 * 
 */
class StalkerService
{

    protected $config;

    protected $modelServices = false;

    public function __construct($config = false)
    {
        // if (!$this->config = $config) {
        //     $this->config = \Illuminate\Support\Facades\Config::get('sitec.sitec.models');
        // }
    }

}
