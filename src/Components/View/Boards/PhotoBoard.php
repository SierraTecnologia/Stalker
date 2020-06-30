<?php

namespace Artista\Components\View\Boards;

use Log;
use App\Models\User;
use Finder\Spider\Integrations\Instagram\Instagram;
use Finder\Spider\Integrations\Instagram\Facebook;


use Artista\Actions\PublishPost;
use Artista\Actions\SearchFollows;


use App\Editores\TuiImageEditor;



use Artista\Routines\ForceNewRelations;
use Artista\Routines\GetNewData;
use Artista\Routines\SendNewData;

use App\Board;
use SiObjects\Components\Comment;
use SiObjects\Components\Post;
use SiObjects\Components\Profile;
use SiObjects\Components\Relation;

class PhotoBoard extends Board
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
