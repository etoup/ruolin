<?php

namespace App\Repositories\Member;

use App\Models\Users;
use App\Exceptions\GeneralException;

/**
 * Class EloquentUsersRepository
 * @package App\Repositories\User
 */
class EloquentUsersRepository implements UsersRepositoryContract
{

    /**
     * @param $per_page
     * @param int $roles
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getUsersPaginated($per_page, $roles = 10, $order_by = 'id', $sort = 'asc'){
        return Users::where('roles', $roles)
            ->orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    public function getUsersSearchPaginated($input, $per_page, $roles = 10, $order_by = 'id', $sort = 'asc'){
        $builder = Users::where('roles', $roles)
            ->orderBy($order_by, $sort);

        if(count($input)){
            $fields_search = config('users.fields_search');

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
     * @param $id
     * @param bool $withRoles
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id, $withRoles = false){
        if ($withRoles) {
            $user = Users::with('roles')->withTrashed()->find($id);
        } else {
            $user = Users::withTrashed()->find($id);
        }

        if (!is_null($user)) {
            return $user;
        }

        throw new GeneralException('没有找到数据');
    }

    /**
     * @param $input
     * @return bool
     * @throws GeneralException
     */
    public function store($input){
        $user = $this->findOrThrowException($input['id']);
        $this->checkUserByEmail($input,$user);
        $this->checkUserByMobile($input,$user);
        $user->nickname = $input['nickname'];
        $user->email = $input['email'];
        $user->mobile = $input['mobile'];
        $user->sex = $input['sex'];
        $user->industry_id = $input['industry_id'];
        $user->company = $input['company'];
        $user->position = $input['position'];
        $user->remark = $input['remark'];
        $user->save();
        return true;
    }

    public function destroy($id){
        $user = $this->findOrThrowException($id);
        if($user->delete()){
            return true;
        }

        throw new GeneralException('删除失败');
    }

    /**
     * @param $input
     * @param $user
     * @throws GeneralException
     */
    private function checkUserByEmail($input, $user)
    {
        //Figure out if email is not the same
        if ($user->email != $input['email']) {
            //Check to see if email exists
            if (Users::where('email', '=', $input['email'])->first()) {
                throw new GeneralException('邮箱重复，请更换');
            }

        }
    }

    /**
     * @param $input
     * @param $user
     * @throws GeneralException
     */
    private function checkUserByMobile($input, $user)
    {
        //Figure out if mobile is not the same
        if ($user->mobile != $input['mobile']) {
            //Check to see if mobile exists
            if (Users::where('mobile', '=', $input['mobile'])->first()) {
                throw new GeneralException('手机重复，请更换');
            }

        }
    }
}
