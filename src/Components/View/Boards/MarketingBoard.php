<?php

namespace Artista\Components\View\Boards;

use Log;
use App\Models\User;
use Finder\Spider\Integrations\Instagram\Instagram;
use Finder\Spider\Integrations\Instagram\Facebook;


use Finder\Actions\PublishPost;
use Finder\Actions\SearchFollows;


use App\Editores\TuiImageEditor;



use Finder\Routines\ForceNewRelations;
use Finder\Routines\GetNewData;
use Finder\Routines\SendNewData;

use App\Board;
use SiObjects\Components\Comment;
use SiObjects\Components\Post;
use SiObjects\Components\Profile;
use SiObjects\Components\Relation;

class MarketingBoard extends Board
{
    
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
