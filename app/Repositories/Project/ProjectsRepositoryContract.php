<?php

namespace App\Repositories\Project;

/**
 * Interface UsersRepositoryContract
 * @package App\Repositories\User
 */
interface ProjectsRepositoryContract
{
    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getUsersPaginated($per_page, $order_by = 'id', $sort = 'asc');
}