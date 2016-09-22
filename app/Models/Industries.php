<?php

namespace App\Models;

use App\Models\Traits\Attribute\IndustriesAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industries extends Model
{
    use SoftDeletes, IndustriesAttribute;

    /**
     * @var string
     */
    protected $table = 'industries';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
