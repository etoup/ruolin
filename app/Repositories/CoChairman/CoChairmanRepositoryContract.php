<?php

namespace App\Repositories\Cochairman;

/**
 * Interface CochairmanRepositoryContract
 * @package App\Repositories\Cochairman
 */
interface CochairmanRepositoryContract
{
    /**
     * @param $per_page
     * @param int $roles
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */
    public function getCochairmanPaginated($per_page, $order_by = 'id', $sort = 'asc');
    public function getReviewPaginated($per_page, $order_by = 'created_at', $sort = 'desc');
    //public function getCategory($per_page,$order_by = 'sort', $sort = 'asc');
    public function findOrThrowException($id);
    public function created($input);
    public function edit($input);
    public function del($id);
    public function destroy($id);
    //添加分类
    //public function addCate($input);
    //查找指定分类
    //public function findOne($id);
    //定义修改联董分类方法
   // public function editCate($input);
    //定义删除联董分类方法
    //public function delCate($id);
}
