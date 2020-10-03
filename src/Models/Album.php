<?php

namespace Stalker\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'alb_id';
    protected $table = 'album';
}
