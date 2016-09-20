<?php

namespace App\Repositories\Shows;
use App\Models\Shows;
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
    //定义获取分类信息
    public function getCategory($per_page){
        $sql="select * from shows_categories ORDER BY sort limit $per_page";
        return DB::select($sql);
    }

    public function findOrThrowException($id){
            $show = Shows::withTrashed()->find($id);
        if (!is_null($show)) {
            return $show;
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
    //定义修改方法
    public function edit($input){
        $shows = new Shows;
        $shows::where('id', $input->id)
            ->update(['title' => $input->title,'video'=>$input->video,'shows_categories_id'=>$input->shows_categories_id]);

    }
    //定义删除方法
    public function del($id){

    }

}