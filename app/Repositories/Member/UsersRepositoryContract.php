<?php

namespace App\Repositories\Member;

/**
 * Interface UsersRepositoryContract
 * @package App\Repositories\User
 */
interface UsersRepositoryContract
{
    /**
     * @param $per_page
     * @param int $roles
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getUsersPaginated($per_page, $roles = 10, $order_by = 'id', $sort = 'asc');

    /**
     * @param $input
     * @param $per_page
     * @param int $roles
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getUsersSearchPaginated($input, $per_page, $roles = 10, $order_by = 'id', $sort = 'asc');

    /**
     * @param $id
     * @param bool $withRoles
     * @return mixed
     */
    public function findOrThrowException($id, $withRoles = false);

    /**
     * @param $input
     * @return mixed
     */
    public function store($input);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}
