<?php

namespace App\Models;

use App\Models\Traits\Attribute\QuotasAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotas extends Model
{
    use SoftDeletes, QuotasAttribute;

    /**
     * @var string
     */
    protected $table = 'quotas';

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
