<?php

namespace App\Repositories\Region;

/**
 * Interface UsersRepositoryContract
 * @package App\Repositories\User
 */
interface RegionsRepositoryContract
{
    /**
     * @param $per_page
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getRegionsPaginated($per_page, $order_by = 'id', $sort = 'asc');

    public function created($input);
}
