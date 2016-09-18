<?php

namespace App\Repositories\IUsers;

/**
 * Interface UsersRepositoryContract
 * @package App\Repositories\IUsers
 */
interface UsersRepositoryContract
{

    /**
     * @param  $id
     * @return mixed
     */
    public function find($id);


}
