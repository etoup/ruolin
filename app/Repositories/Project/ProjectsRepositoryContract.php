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
    /**
     * @param $input
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getSearchPaginated($input,$per_page, $order_by = 'id', $sort = 'asc');

    public function getRegions();
    public function getIndustries();
    public function getQuotas();

    public function created($input);

    /**
     * @param $id
     * @param bool $withRoles
     * @return mixed
     */
    public function findOrThrowException($id, $withRoles = false);

    public function store($input);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}
