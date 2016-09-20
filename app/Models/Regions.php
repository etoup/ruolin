<?php

namespace App\Models;

use App\Models\Traits\Attribute\RegionsAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regions extends Model
{
    use SoftDeletes, RegionsAttribute;

    /**
     * @var string
     */
    protected $table = 'regions';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
