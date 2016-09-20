<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attribute\ShowsAttribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shows extends Model
{
    use SoftDeletes,ShowsAttribute;

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
