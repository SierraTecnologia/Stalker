<?php
/**
 * 
 */

namespace Artista\Components\View\Boards;

use Log;

class PersonalBoard extends Board
{

    protected function dashboard()
    {

    }

    protected function getInteresses()
    {
        $routines = [
            // Capturar Noticias via Rss

            // Capturar Eventos

            // Capturar Financeiro

            // Capturar Oportunidade de Trabalho

        ];

        return $routines;
    }

    /**
     * 
     */
    public function getBoards()
    {
        return [
            BusinessBoard::class
        ];
    }

}
