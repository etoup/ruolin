<?php

namespace App\Repositories\IUsers;

/**
 * Class EloquentUsersRepository
 * @package App\Repositories\IUsers
 */
class EloquentUsersRepository implements UsersRepositoryContract
{

    /**
     * @param  $id
     * @return mixed
     */
    public function find($id)
    {
        return Users::find($id);
    }



}
