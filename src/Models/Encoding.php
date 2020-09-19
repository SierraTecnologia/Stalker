<?php

namespace Stalker\Models;

use MediaManager\Models\Encoding as Base;

/**
 * Stores the status of an encoding job and the converted outputs.
 * It was designed to handle the conversion of video files to
 * HTML5 formats with Zencoder but should be abstract enough to
 * support other types of encodings.
 */
class Encoding extends Base
{
}
