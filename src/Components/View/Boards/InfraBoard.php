<?php
/**
 * 
 */

namespace Artista\Components\View\Boards;

use Log;

class InfraBoard extends Board
{
    protected function dashboard()
    {

    }

    protected function getInteresses()
    {
        return [
            // Status dos Servidores
        ];
    }

    protected function getHooks()
    {
        return [
            // Status dos Servidores
        ];
    }

    /**
     * Se byClass nao for false, retorna todas as ações para qualquer tipo de instancia
     */
    public function getTools()
    {
        return [
            \SiObjects\Components::class,
        ];
    }

}
