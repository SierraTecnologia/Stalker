<?php

namespace Stalker\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use League\Flysystem\Plugin\ListWith;
use Stalker\Events\MediaFileAdded;

class MediaController extends Controller
{

    public function vlc(Request $request)
    {
        // Check permission
        // $this->authorize('browse_media');

        return view('media.vlc'); //, compact($videos));
    }
}
