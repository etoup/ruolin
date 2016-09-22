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

    public function getDelButtonAttribute()
    {
        if (!Auth::guest()) {
            return '<a href="' . route('backend.shows.del', $this->id) . '" class="btn btn-xs btn-danger" data-method="delete"><i class="fa fa-close" data-toggle="tooltip" data-placement="top" title="删除"></i></a> ';
        }

        return '';
    }
<<<<<<< HEAD
=======

    public function getReviewButtonAttribute()
    {
        if (!Auth::guest()) {
            if(!$this->status){
                return '<a href="' . route('backend.shows.review', $this->id) . '" class="btn btn-xs btn-danger" data-method="delete"><i class="fa fa-heart" data-toggle="tooltip" data-placement="top" title="审核"></i></a> ';
            }
        }

        return '';
    }
>>>>>>> 734652a658a650655775a7f6237beec51485af0a
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getEditButtonAttribute().
<<<<<<< HEAD
            $this->getDelButtonAttribute();
=======
            $this->getDelButtonAttribute().
        $this->getReviewButtonAttribute();
>>>>>>> 734652a658a650655775a7f6237beec51485af0a
    }


}