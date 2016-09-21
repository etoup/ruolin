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
    public function getCategory($per_page,$order_by = 'sort', $sort = 'asc');
    public function findOrThrowException($id);
    public function created($input);
    public function edit($input);
    public function del($id);
    //添加分类
    public function addCate($input);
    //查找指定分类
    public function findOne($id);
    //定义修改路演分类方法
    public function editCate($input);
    //定义删除路演分类方法
    public function delCate($id);
}
