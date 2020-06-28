<?php

namespace Artista\Models;

use Support\Models\Base;
use Artista\Models\Digital\Code\Issue;
use Artista\Models\Digital\Code\Field;
use Artista\Models\Digital\Code\Project;

class Reference extends Base
{

    protected $organizationPerspective = false;

    protected $table = 'references';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
    ];


    /**
     * Get all of the issues that are assigned this reference.
     */
    public function issues()
    {
        return $this->morphedByMany(Issue::class)->withPivot('identify');
    }


    /**
     * Get all of the fields that are assigned this reference.
     */
    public function fields()
    {
        return $this->morphedByMany(Field::class)->withPivot('identify');
    }

    /**
     * Get all of the projects that are assigned this reference.
     */
    public function projects()
    {
        return $this->morphedByMany(Project::class)->withPivot('identify');
    }
    
}