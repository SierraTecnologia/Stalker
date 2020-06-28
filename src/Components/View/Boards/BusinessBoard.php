<?php
/**
 * 
 */

namespace Artista\Components\View\Boards;

use Log;

class BusinessBoard extends Board
{

    protected function dashboard()
    {

    }

    protected function getInteresses()
    {
        return [

        ];
    }

    /**
     * 
     */
    public function getBoards()
    {
        return [
            InfraBoard::class
        ];
    }
    
    public function getActions()
    {
        return [
            'Editor' => $this->getEditores(),
            'Save' => new GetNewData($this),
            'Delete' => new SendNewData($this),
            'Send' => $this->getIntegrations()
        ];
    }

    public function getComponents()
    {
        return [
            Post::class
        ];
    }

    /**
     * 
     */
    
    public function getEditores()
    {
        return [
            TuiImageEditor::class,
        ];
    }

}
