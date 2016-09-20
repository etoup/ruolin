<?php

namespace App\Models;

use App\Models\Traits\Attribute\ProjectsAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use SoftDeletes, ProjectsAttribute;

    /**
     * @var string
     */
    protected $table = 'projects';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
