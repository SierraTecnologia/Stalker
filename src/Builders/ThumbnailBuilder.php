<?php

namespace Artista\Builders;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class ThumbnailBuilder.
 *
 * @package Artista\Builders
 */
class ThumbnailBuilder extends Builder
{
    /**
     * @return $this
     */
    public function whereHasNoPhotos()
    {
        return $this->doesntHave('photos');
    }
}
