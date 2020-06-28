<?php

namespace Artista\Components\Worker\Explorer;

use Artista\Models\Digital\Infra\Domain;
use Artista\Models\Digital\Infra\SubDomain;
use Artista\Models\Digital\Infra\DomainLink;

/**
 * Spider Class
 *
 * @class   Spider
 * @package crawler
 */
class Whois
{

    protected $domain = false;

    
    public function __construct($domain)
    {

        $this->domain = $domain;
    }

    public function execute()
    {
        
    }

}
