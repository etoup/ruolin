<?php

namespace App\Repositories\Region;

use App\Models\Regions;
use Carbon\Carbon;

/**
 * Class EloquentUsersRepository
 * @package App\Repositories\User
 */
class EloquentRegionsRepository implements RegionsRepositoryContract
{

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getRegionsPaginated($per_page,  $order_by = 'id', $sort = 'asc'){
        return Regions::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    public function created($input){
        Regions::insert(['name'=>$input['name'],'sort'=>$input['sort'],'created_at'=>Carbon::now()]);
    }
}
