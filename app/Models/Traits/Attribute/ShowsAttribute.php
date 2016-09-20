<?php

namespace App\Models\Traits\Attribute;
use Illuminate\Support\Facades\Auth;

/**
 * Class UsersAttribute
 * @package App\Models\Traits\Attribute
 */
trait ShowsAttribute
{



    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if (!Auth::guest()) {
            return '<a href="' . route('backend.shows.edit', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="编辑"></i></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute();
    }


}