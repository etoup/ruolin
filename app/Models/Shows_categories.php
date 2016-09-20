<?php

namespace App\Models;
use App\Models\Traits\Attribute\ShowCateAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shows_categories extends Model
{
    use SoftDeletes,ShowCateAttribute;

    /**
     * @var string
     */
    protected $table = 'shows_categories';
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
