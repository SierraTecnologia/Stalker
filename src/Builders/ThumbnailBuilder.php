<?php

namespace Stalker\Builders;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class ThumbnailBuilder.
 *
 * @package Stalker\Builders
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
