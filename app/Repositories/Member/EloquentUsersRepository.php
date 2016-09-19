<?php

namespace App\Repositories\Member;

use App\Models\Users;
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

}
