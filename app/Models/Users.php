<?php

namespace App\Models;

use App\Models\Traits\Attribute\UsersAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes, UsersAttribute;

    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
