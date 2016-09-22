<?php

namespace App\Repositories\Region;

use App\Exceptions\GeneralException;
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

    public function getRegionsSearchPaginated($input, $per_page, $roles = 10, $order_by = 'id', $sort = 'asc'){
        $builder = Regions::orderBy($order_by, $sort);

        if(count($input)){
            $fields_search = [
                'name'  => [
                    'label' => '地区名称',
                    'tags'  => "name like CONCAT('%', ?, '%')"
                ]
            ];
            foreach($input as $field => $value){
                if (empty($value)) {
                    continue;
                }
                if (!isset($fields_search[$field])) {
                    continue;
                }

                switch($field){
                    case 'date':
                        $date = explode('-',$value);
                        $value = [date('Y-m-d h:i:s',strtotime($date[0])),date('Y-m-d h:i:s',strtotime($date[1]))];
                        break;
                    default:
                        $value = [$value];
                }

                $search = $fields_search[$field];

                $builder->whereRaw($search['tags'], $value);
            }
        }

        $list = $builder->paginate($per_page);

        return $list;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function created($input){
        return Regions::insert(['name'=>$input['name'],'sort'=>$input['sort'],'created_at'=>Carbon::now()]);
    }

    /**
     * @param $id
     * @param bool $withRoles
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id, $withRoles = false){
        if ($withRoles) {
            $regions = Regions::with('roles')->withTrashed()->find($id);
        } else {
            $regions = Regions::withTrashed()->find($id);
        }

        if (!is_null($regions)) {
            return $regions;
        }

        throw new GeneralException('没有找到数据');
    }

    public function store($input){
        $region = $this->findOrThrowException($input['id']);

        $region->name = $input['name'];
        $region->sort = $input['sort'];

        $region->save();

        return true;
    }

    public function destroy($id){
        $region = $this->findOrThrowException($id);
        if($region->delete()){
            return true;
        }

        throw new GeneralException('删除失败');
    }
}
