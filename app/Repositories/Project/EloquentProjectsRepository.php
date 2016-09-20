<?php

namespace App\Repositories\Project;

use App\Models\Projects;
use App\Exceptions\GeneralException;

/**
 * Class EloquentUsersRepository
 * @package App\Repositories\User
 */
class EloquentProjectsRepository implements ProjectsRepositoryContract
{

    /**
     * @param $per_page
     * @param int $roles
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getUsersPaginated($per_page,  $order_by = 'id', $sort = 'asc'){
        return Projects::orderBy($order_by, $sort)
            ->paginate($per_page);
    }


}
