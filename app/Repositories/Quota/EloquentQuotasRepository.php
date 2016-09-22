<?php

namespace App\Repositories\Quota;

use App\Exceptions\GeneralException;
use App\Models\Quotas;
use Carbon\Carbon;

/**
 * Class EloquentUsersRepository
 * @package App\Repositories\User
 */
class EloquentQuotasRepository implements QuotasRepositoryContract
{

    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page,  $order_by = 'id', $sort = 'asc'){
        return Quotas::orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    public function getSearchPaginated($input, $per_page, $roles = 10, $order_by = 'id', $sort = 'asc'){
        $builder = Quotas::orderBy($order_by, $sort);

        if(count($input)){
            $fields_search = [
                'name'  => [
                    'label' => '额度区间',
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
        return Quotas::insert(['name'=>$input['name'],'sort'=>$input['sort'],'created_at'=>Carbon::now()]);
    }

    /**
     * @param $id
     * @param bool $withRoles
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id, $withRoles = false){
        if ($withRoles) {
            $quotas = Quotas::with('roles')->withTrashed()->find($id);
        } else {
            $quotas = Quotas::withTrashed()->find($id);
        }

        if (!is_null($quotas)) {
            return $quotas;
        }

        throw new GeneralException('没有找到数据');
    }

    public function store($input){
        $quota = $this->findOrThrowException($input['id']);

        $quota->name = $input['name'];
        $quota->sort = $input['sort'];

        $quota->save();

        return true;
    }

    public function destroy($id){
        $quota = $this->findOrThrowException($id);
        if($quota->delete()){
            return true;
        }

        throw new GeneralException('删除失败');
    }
}
