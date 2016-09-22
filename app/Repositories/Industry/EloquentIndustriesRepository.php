<?php

namespace App\Repositories\Industry;

use App\Exceptions\GeneralException;
use App\Models\Industries;
use Carbon\Carbon;

/**
 * Class EloquentUsersRepository
 * @package App\Repositories\User
 */
class EloquentIndustriesRepository implements IndustriesRepositoryContract
{

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page,  $order_by = 'id', $sort = 'asc'){
        return Industries::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    public function getSearchPaginated($input, $per_page, $roles = 10, $order_by = 'id', $sort = 'asc'){
        $builder = Industries::orderBy($order_by, $sort);

        if(count($input)){
            $fields_search = [
                'name'  => [
                    'label' => '行业名称',
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
        return Industries::insert(['name'=>$input['name'],'sort'=>$input['sort'],'created_at'=>Carbon::now()]);
    }

    /**
     * @param $id
     * @param bool $withRoles
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id, $withRoles = false){
        if ($withRoles) {
            $industries = Industries::with('roles')->withTrashed()->find($id);
        } else {
            $industries = Industries::withTrashed()->find($id);
        }

        if (!is_null($industries)) {
            return $industries;
        }

        throw new GeneralException('没有找到数据');
    }

    public function store($input){
        $industry = $this->findOrThrowException($input['id']);

        $industry->name = $input['name'];
        $industry->sort = $input['sort'];

        $industry->save();

        return true;
    }

    public function destroy($id){
        $industry = $this->findOrThrowException($id);
        if($industry->delete()){
            return true;
        }

        throw new GeneralException('删除失败');
    }
}
