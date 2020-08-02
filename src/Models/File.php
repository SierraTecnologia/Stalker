<?php

namespace Stalker\Models;

use Muleta\Traits\Models\ArchiveTrait;

class File extends ArchiveTrait
{
    public $table = 'files';

    public $primaryKey = 'id';

    protected $guarded = [];

    public $rules = [
        'location' => 'required',
    ];
}
