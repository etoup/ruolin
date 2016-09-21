<?php

namespace App\Repositories\Project;

use App\Models\Industries;
use App\Models\Projects;
use App\Exceptions\GeneralException;
use App\Models\Quotas;
use App\Models\Regions;

/**
 * Class EloquentUsersRepository
 * @package App\Repositories\User
 */
class EloquentProjectsRepository implements ProjectsRepositoryContract
{

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page,  $order_by = 'id', $sort = 'asc'){
        return Projects::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    public function getRegions(){
        return Regions::orderBy('id','asc')->pluck('name','id');
    }

    public function getIndustries(){
        return Industries::orderBy('id','asc')->pluck('name','id');
    }

    public function getQuotas(){
        return Quotas::orderBy('id','asc')->pluck('name','id');
    }

    public function created($input){
        return Projects::insert([
            'users_id' => 2,
            'name' => $input['name'],
            'ways' => $input['ways'],
            'card' => $input['card'],
            'business_name' => $input['business_name'],
            'regions_id' => $input['regions_id'],
            'address' => $input['address'],
            'industries_id' => $input['industries_id'],
            'quotas_id' => $input['quotas_id'],
            'types' => $input['types'],
            'has_stores' => $input['has_stores'],
            'cycle' => $input['cycle'],
            'information' => $input['information'],
            'brand_name' => $input['brand_name'],
            'describe' => $input['describe'],
            'characteristic' => $input['characteristic'],
            'policy' => $input['policy'],
        ]);
    }
}
