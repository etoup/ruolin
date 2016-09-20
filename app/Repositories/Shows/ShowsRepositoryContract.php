<?php

namespace App\Repositories\Shows;

/**
 * Interface ShowsRepositoryContract
 * @package App\Repositories\Shows
 */
interface ShowsRepositoryContract
{
    /**
     * @param $per_page
     * @param int $roles
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getShowsPaginated($per_page, $order_by = 'id', $sort = 'asc');
    public function getCategory($per_page,$order_by = 'id', $sort = 'asc');
    public function findOrThrowException($id);
    public function created($input);
    public function edit($input);
    public function del($id);
}
