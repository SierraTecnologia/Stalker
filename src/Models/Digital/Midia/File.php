<?php

namespace Artista\Models\Digital\Midia;

use Informate\Traits\ArchiveTrait;

class File extends ArchiveTrait
{
    public $table = 'files';

    public $primaryKey = 'id';

    protected $guarded = [];

    public static $rules = [
        'location' => 'required',
    ];
}
