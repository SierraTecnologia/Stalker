<?php

namespace Stalker\Models;

use Pedreiro\Models\Base;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\SoftDeletes;
use Translation\Models\Language;

class PhotoAlbum extends Base
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

    /**
     * Get the post's author.
     *
     * @return User
     */
    public function author()
    {
        return $this->belongsTo(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'user_id');
    }
    /**
     * Get the post's comments.
     *
     * @return array
     */
    public function photos()
    {
        return $this->hasMany(Photo::class, 'photo_album_id');
    }

    /**
     * Get the photo album's language.
     *
     * @return Language
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}