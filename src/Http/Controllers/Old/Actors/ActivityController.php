<?php

namespace Artista\Http\Controllers\Components\Actors;

use Artista\Http\Requests;
use Artista\Http\Controllers\Controller;
use Population\Models\Activity;
use Population\Models\Banner;
use Population\Models\Link;
use Population\Models\ActiveUser;
use Population\Models\HotTopic;
use Population\Models\Image;
use Illuminate\Http\Request;
use Auth;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        switch ($request->view) {
        case 'all':
            $activities = Activity::recent()->paginate(50);
            break;

        case 'mine':
            $activities = Auth::user()->activities();
            break;

        default:
            $activities = Auth::user()->subscribedActivityFeeds();
            break;
        }

        $links  = Link::allFromCache();
        $banners = Banner::allByPosition();

        $active_users = ActiveUser::fetchAll();
        $hot_topics = HotTopic::fetchAll();
        $images = Image::fromActivities($activities);

        return view('siravel::components.modules.activities.index', compact('activities', 'links', 'banners', 'active_users', 'hot_topics', 'images'));
    }

}
