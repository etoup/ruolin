<?php

namespace App\Repositories\Shows;

use App\Models\Shows;
use Illuminate\Support\Facades\DB;

/**
 * Class EloquentShowsRepository
 * @package App\Repositories\Show
 */
class EloquentShowsRepository implements ShowsRepositoryContract
{

    /**
     * @param $per_page
     * @param int $roles
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getShowsPaginated($per_page, $order_by = 'id', $sort = 'asc')
    {
        $sql = "select shows.*,users.name from shows  JOIN users on shows.users_id = users.id limit $per_page";
        return DB::select($sql);
        //获取路演shows表数据
    }
    //定义获取分类信息
    public function getCategory($per_page){
        $sql="select * from shows_categories ORDER BY sort limit $per_page";
        return DB::select($sql);
    }

}