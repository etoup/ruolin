<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shows extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'shows';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
