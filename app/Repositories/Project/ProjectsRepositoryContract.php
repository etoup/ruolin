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
    public function getPaginated($per_page, $order_by = 'id', $sort = 'asc');

    public function getRegions();
    public function getIndustries();
    public function getQuotas();

    public function created($input);
}
