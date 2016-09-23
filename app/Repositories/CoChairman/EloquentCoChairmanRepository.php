<?php

namespace App\Repositories\Cochairman;
use App\Models\Cochairman;
use App\Models\Cochairman_categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

/**
 * Class EloquentCochairmanRepository
 * @package App\Repositories\Show
 */
class EloquentCochairmanRepository implements CochairmanRepositoryContract
{

    /**
     * @param $per_page
     * @param int $roles
     * @param string $order_by
     * @param string $sort
     * @return mixed
     */

    //获取联董Cochairman表数据
    public function getCochairmanPaginated($per_page, $order_by = 'cochairman.id', $sort = 'asc')
    {
        return Cochairman::leftJoin('users', 'cochairman.userid', '=', 'users.id')
            ->orderBy($order_by, $sort)
            ->select('users.headimgurl','users.email','users.mobile','users.nickname','users.company','users.position','cochairman.*')
            ->paginate($per_page);
    }

    //获取联董Cochairman表数据
    public function getReviewPaginated($per_page, $order_by = 'cochairman.created_at', $sort = 'desc')
    {
        return Cochairman::leftJoin('users', 'cochairman.userid', '=', 'users.id')
            ->where('cochairman.review',0)
            ->orderBy($order_by, $sort)
            ->select('users.headimgurl','users.email','users.mobile','users.nickname','users.company','users.position','cochairman.*')
            ->paginate($per_page);
    }

    //查找并抛出异常
    public function findOrThrowException($id){
            $cochairman = Cochairman::withTrashed()->find($id);
        if (!is_null($cochairman)) {
            return $cochairman;
        }
        throw new GeneralException('没有找到数据');
    }

    //添加联董
    public function created($input){
        $cochairman = new Cochairman;
        $cochairman->userid = $input['userid'];
        $cochairman->save();
    }

    //确认审核
    public function reviewed($id,$review){
        //dd($input);exit;
        $cochairman=$this->findOrThrowException($id);
        $cochairman->review=$review;
        $cochairman->update();
    }

    //定义联董修改方法
    public function edit($input){
        $cochairman = $this->findOrThrowException($input['id']);
        $cochairman->userid = $input['userid'];
        $cochairman->save();
        return true;
    }

    //定义联董删除方法
    public function del($id){
        $cochairman = $this->findOrThrowException($id);
        if($cochairman->delete()){
            return true;
        }
        throw new GeneralException('删除失败');
    }

    //定义联董删除方法
    public function destroy($id){
        $user = $this->findOrThrowException($id);
        if($user->delete()){
            return true;
        }
        throw new GeneralException('删除失败');
    }

}