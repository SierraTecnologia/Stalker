<?php
namespace Artista\Components\Pipelines;

use Log;
use App\Models\User;
use Artista\Spider\Integrations\Instagram\Instagram;
use Artista\Spider\Integrations\Instagram\Facebook;


use Artista\Actions\PublishPost;
use Artista\Actions\SearchFollows;



use Artista\Routines\ForceNewRelations;
use Artista\Routines\GetNewData;
use Artista\Routines\SendNewData;

use SiObjects\Components\Comment;
use SiObjects\Components\Post;
use SiObjects\Components\Profile;
use SiObjects\Components\Relation;

use App\Pipelines\Contracts\Registrator;
use App\Pipelines\Contracts\Notificator;

class NotificationSms
{
    public function notification(Notificator $something)
    {
        echo 'notification ' . $something . '<br>';
        return $something;
    }
}