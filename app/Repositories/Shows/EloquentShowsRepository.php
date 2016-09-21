<?php

namespace App\Repositories\Shows;
use App\Models\Shows;
use App\Models\Shows_categories;
use Illuminate\Support\Facades\Auth;
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
    public function getShowsPaginated($per_page, $order_by = 'shows.id', $sort = 'asc')
    {

/*        $sql = "select shows.*,users.name from shows  JOIN users on shows.users_id = users.id limit $per_page";
        return DB::select($sql);*/
        //获取路演shows表数据
        return Shows::leftJoin('users', 'shows.users_id', '=', 'users.id')
            ->orderBy($order_by, $sort)
            ->select('users.name','shows.*')
            ->paginate($per_page);
    }


    public function findOrThrowException($id){
            $show = Shows::withTrashed()->find($id);
        if (!is_null($show)) {
            return $show;
        }

        throw new GeneralException('没有找到数据');
    }

    //定义查找指定id的分类
    public function findOne($id){
        $showCate = Shows_categories::withTrashed()->find($id);
        if (!is_null($showCate)) {
            return $showCate;
        }

        throw new GeneralException('没有找到数据');
    }
    public function created($input){
        $shows = new Shows;
        $shows->title = $input['title'];
        $shows->shows_categories_id = $input['shows_categories_id'];
        $shows->thumbnail = $input['thumbnail'];
        $shows->video = 111;
        $shows->original = 1112;
        $shows->content = $input['content'];
        $shows->users_id = Auth::user()->id;
        $shows->save();
    }
    //定义路演修改方法
    public function edit($input){
        $shows = $this->findOrThrowException($input['id']);
        $shows->title = $input['title'];
        $shows->thumbnail = $input['thumbnail'];
        $shows->shows_categories_id = $input['shows_categories_id'];
        $shows->video = $input['video'];
        $shows->original = $input['original'];
        $shows->content = $input['content'];
        $shows->users_id = Auth::user()->id;
        $shows->save();
        return true;

    }
    //定义路演删除方法
    public function del($id){
        $shows = $this->findOrThrowException($id);
        if($shows->delete()){
            return true;
        }

        throw new GeneralException('删除失败');
    }

    //定义获取分类信息
    public function getCategory($per_page,$order_by = 'sort', $sort = 'asc'){
        return Shows_categories::orderBy($order_by, $sort)
            ->paginate($per_page);
    }
    //定义添加分类方法
    public function addCate($input){
        $showsCate = new Shows_categories;
        $showsCate->title = $input['title'];
        $showsCate->types = $input['types'];
        $showsCate->sort = $input['sort'];
        $showsCate->save();
    }

    //定义修改分类方法
    public function editCate($input){
        $showsCate = $this->findOne($input['id']);
        $showsCate->title = $input['title'];
        $showsCate->types = $input['types'];
        $showsCate->sort = $input['sort'];
        $showsCate->save();
        return true;
    }
    //定义删除路演分类方法
    public function delCate($id){
        $showsCate = $this->findOne($id);
        if($showsCate->delete()){
            return true;
        }

        throw new GeneralException('删除失败');
    }

}