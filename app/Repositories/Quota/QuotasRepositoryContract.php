<?php

namespace App\Repositories\Quota;

/**
 * Interface UsersRepositoryContract
 * @package App\Repositories\User
 */
interface QuotasRepositoryContract
{
    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param $input
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getSearchPaginated($input,$per_page, $order_by = 'id', $sort = 'asc');

    /**
     * @param $input
     * @return mixed
     */
    public function created($input);

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
