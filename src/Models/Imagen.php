<?php

namespace Stalker\Models;

use Support\Traits\Models\ArchiveTrait;

use Carbon\Carbon;
use Config;
use FileService;
use Exception;
use Illuminate\Support\Facades\Cache;
use Log;
use Intervention\Image\ImageManagerStatic as InterventionImage;
use Storage;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig;

class Imagen extends ArchiveTrait
{
    public $table = 'imagens';

    public $primaryKey = 'id';

    protected $guarded = [];

    protected $appends = [
        'url',
        'js_url',
        'data_url',
    ];

    public static $rules = [
        'location' => 'mimes:jpeg,jpg,bmp,png,gif',
    ];

    public function links()
    {
        return $this->sitios();
    }

    public function sitios()
    {
        return $this->morphToMany('Population\Models\Identity\Digital\Sitio', 'sitioable');
    }

    /**
     * Get all of the users that are assigned this tag.
     */
    public function users()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.user', \App\Models\User::class), 'imagenable');
    }

    /**
     * Get all of the persons that are assigned this tag.
     */
    public function persons()
    {
        return $this->morphedByMany(\Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Population\Models\Identity\Actors\Person::class), 'imagenable');
    }

    /**
     * Get the images url location.
     *
     * @param string $value
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return $this->remember(
            'url', function () {
                if ($this->isLocalFile()) {
                    return url(str_replace('public/', 'storage/', $this->location));
                }

                return FileService::fileAsPublicAsset($this->location);
            }
        );
    }

    /**
     * Get the images url location.
     *
     * @param string $value
     *
     * @return string
     */
    public function getJsUrlAttribute()
    {
        return $this->remember(
            'js_url', function () {
                if ($this->isLocalFile()) {
                    $file = url(str_replace('public/', 'storage/', $this->location));
                } else {
                    $file = FileService::fileAsPublicAsset($this->location);
                }

                return str_replace(url('/'), '', $file);
            }
        );
    }

    /**
     * Get the images url location.
     *
     * @param string $value
     *
     * @return string
     */
    public function getDataUrlAttribute()
    {
        return $this->remember(
            'data_url', function () {
                if ($this->isLocalFile()) {
                    $imagePath = storage_path('app/'.$this->location);
                } else {
                    $imagePath = Storage::disk(\Illuminate\Support\Facades\Config::get('facilitador.storage.disk', \Illuminate\Support\Facades\Config::get('filesystems.default', 'local')))->url($this->location);
                }

                $image = InterventionImage::make($imagePath)->resize(800, null);

                return (string) $image->encode('data-url');
            }
        );
    }

    public function remember($attribute, $closure)
    {
        $key = $attribute.'_'.$this->location;

        if (!Cache::has($key)) {
            $expiresAt = Carbon::now()->addMinutes(15);
            Cache::put($key, $closure(), $expiresAt);
        }

        return Cache::get($key);
    }

    /**
     * Check the location of the file.
     *
     * @return bool
     */
    private function isLocalFile()
    {
        try {
            $headers = @get_headers(url(str_replace('public/', 'storage/', $this->location)));

            if (strpos($headers[0], '200')) {
                return true;
            }
        } catch (Exception $e) {
            Log::channel('sitec-stalker')->debug('Could not find the image');

            return false;
        }

        return false;
    }

    /**
     * Check the location of the file.
     *
     * @return bool
     */
    public static function createByExternalLink($link, $target, $data = [])
    {
        $personClass = \Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Population\Models\Identity\Actors\Person::class);

        $person = $personClass::createIfNotExistAndReturn($target);

        return $person->addMediaFromUrl($link)->preservingOriginal()->toMediaCollection('images');
    }

    /**
     * Check the location of the file.
     *
     * @return bool
     */
    public static function createByMediaFromDisk($disk, $link, $target, $data = [])
    {
        if (is_string($target)) {
            $personClass = \Illuminate\Support\Facades\Config::get('sitec.core.models.person', \Population\Models\Identity\Actors\Person::class);
            $person = $personClass::createIfNotExistAndReturn($target);
        } else {
            $person = $target;
        }
        
        try {
            $link = storage_path('app/'.$link);
            // return $person->addMediaFromDisk($disk, $link)->toMediaCollection('images');
            return $person->addMedia($link)->toMediaCollection('images');
        } catch (FileIsTooBig $th) {
            Log::warning(
                $th->getMessage()
            );
        }
    }
}
