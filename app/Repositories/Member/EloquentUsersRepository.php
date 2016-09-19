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
}
