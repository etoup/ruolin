<?php

namespace App\Models;

use App\Models\Traits\Attribute\CochairmanAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cochairman extends Model
{
    use SoftDeletes, CochairmanAttribute;

    /**
     * @var string
     */
    protected $table = 'cochairman';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
