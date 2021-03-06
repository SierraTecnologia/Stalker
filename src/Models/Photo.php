<?php

namespace Stalker\Models;

use Stalker\Builders\PhotoBuilder;
use App\Contants\Tables;
use Carbon\Carbon;
use MediaManager\Entities\PhotoEntity;
use Illuminate\Database\Eloquent\Collection;
use Pedreiro\Models\Base;
use Siravel\Models\Blog\Post;
use Locaravel\Models\Localization;
use Translation\Models\Language;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Photo.
 *
 * @property int id
 * @property int created_by_user_id
 * @property int localization_id
 * @property string path
 * @property string avg_color
 * @property array metadata
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property User createdByUser
 * @property User location
 * @property Collection thumbnails
 * @property Post post
 * @property Collection posts
 * @package  App\Models
 */
class Photo extends Base
{
    use SoftDeletes;
    public static $classeBuilder = PhotoBuilder::class;

    protected $dates = ['deleted_at'];

    protected $guarded  = array('id');

    /**
     * @inheritdoc
     */
    protected $attributes = [
        'path' => '',
        'avg_color' => '',
        'metadata' => '',
    ];

    /**
     * @inheritdoc
     */
    protected $casts = [
        'metadata' => 'array',
    ];

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'created_by_user_id',
        'path',
    ];

    /**
     * @var array
     */
    public static $entityRelations = [
        'location',
        'thumbnails',
    ];

    /**
     * @inheritdoc
     */
    public static function boot()
    {
        parent::boot();

        static::deleting(
            function (self $photo) {
                $photo->thumbnails()->detach();
            }
        );
    }

    /**
     * @inheritdoc
     */
    public function newEloquentBuilder($query): PhotoBuilder
    {
        return new PhotoBuilder($query);
    }

    /**
     * @inheritdoc
     */
    public function newQuery(): PhotoBuilder
    {
        return parent::newQuery();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdByUser()
    {
        return $this->belongsTo(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'created_by_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Localization::class, 'localization_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function thumbnails()
    {
        return $this->belongsToMany(Thumbnail::class, 'thumbnails')
            ->orderBy('width')
            ->orderBy('height');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, Tables::TABLE_POSTS_PHOTOS);
    }
    
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
     * Get the gallery for pictures.
     *
     * @return array
     */
    public function album()
    {
        return $this->belongsTo(PhotoAlbum::class, 'photo_album_id');
    }

    /**
     * Get the photo's language.
     *
     * @return Language
     */
    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }

    /**
     * @return Post|null
     */
    public function getPostAttribute(): ?Post
    {
        $this->setRelation('post', collect($this->posts)->first());

        $post = $this->getRelation('post');

        return $post;
    }

    /**
     * @return $this
     */
    public function loadEntityRelations(): Photo
    {
        return $this->load(static::$entityRelations);
    }

    /**
     * @return PhotoEntity
     */
    public function toEntity(): PhotoEntity
    {
        return new PhotoEntity(
            [
            'id' => $this->id,
            'created_by_user_id' => $this->created_by_user_id,
            'path' => $this->path,
            'avg_color' => $this->avg_color,
            'metadata' => $this->metadata,
            'created_at' => $this->created_at ? $this->created_at->toAtomString() : null,
            'updated_at' => $this->updated_at ? $this->updated_at->toAtomString() : null,
            'location' => $this->location ? $this->location->toArray() : null,
            'thumbnails' => $this->thumbnails->toArray(),
            ]
        );
    }
}
