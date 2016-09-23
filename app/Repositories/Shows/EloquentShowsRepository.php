<?php

namespace App\Repositories\Shows;
use App\Models\Projects;
use App\Models\Shows;
use App\Models\Shows_categories;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;


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
            ->leftJoin('shows_categories','shows.shows_categories_id','=','shows_categories.id')
            ->orderBy($order_by, $sort)
            ->select('users.name','shows_categories.title as cate','shows.*')
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

    //获取项目
    public function getProject(){
        return Projects::where('users_id','=',2)->pluck('business_name','id');
    }
    //获取分类名称
    public function getCate(){
        return Shows_categories::get();
    }

    //添加路演
    public function created($input){
        $shows = new Shows;
        $imgUrl='';
        if (isset($input['thumbnail'])){
        $file=$input['thumbnail'];
            if($file ->isValid()){
                //判断上传文件是否有效
                $images=array(                                                                          //文件格式限制
                    'jpg','png','jpeg','gif','bmp'
                );
                if(in_array($file->getClientOriginalExtension(),$images )) {           //判断文件后缀是否符合限制
                    // $size=8*1024*1024;
                    // if($file->getClientSize()<$size){
                    $imgName = time().substr(uniqid(), -6) . "." . $file->getClientOriginalExtension();
                    //文件重命名
                    $imgUrl = $file->move('img/upload/', $imgName)->getPathname();     //保存文件，并获取url
                }
            }
        }
        $shows->shows_categories_id = $input['shows_categories_id'];
        $shows->project_id = $input['project_id'];
        $shows->purpose = $input['purpose'];
        $shows->price = $input['price'];
        $shows->program = $input['program'];
        $shows->area = $input['area'];
        $shows->times = $input['times'];
        $shows->scale = $input['scale'];
        $shows->guest = $input['guest'];
        if ($imgUrl!=''){
            $shows->thumbnail = '/'.$imgUrl;
            $shows->original = '/'.$imgUrl;
        }else{
            $shows->thumbnail='/img/upload/pic.jpg';
        }
        if($input['title']==''){
            $shows->title = '路演申请中，暂无标题';
        }else{
            $shows->title=$input['title'];
        }
        $shows->video = $input['video'];
        $shows->content = $input['content'];
        $shows->users_id = Auth::user()->id;
        $shows->save();
    }
    //定义路演修改方法
    public function edit($input){
//        dd($input['thumbnail']);
        //dd($input);
        $shows = $this->findOrThrowException($input['id']);
        $imgUrl='';
        if (isset($input['thumbnail'])){
            $file=$input['thumbnail'];
            if($file ->isValid()){
                //判断上传文件是否有效
                $images=array(                                                                          //文件格式限制
                    'jpg','png','jpeg','gif','bmp'
                );
                if(in_array($file->getClientOriginalExtension(),$images )) {           //判断文件后缀是否符合限制
                    // $size=8*1024*1024;
                    // if($file->getClientSize()<$size){
                    $imgName = time().substr(uniqid(), -6) . "." . $file->getClientOriginalExtension();
                    //文件重命名
                    $imgUrl = $file->move('img/upload/', $imgName)->getPathname();     //保存文件，并获取url
                }
            }

                $shows->thumbnail = '/'.$imgUrl;
                $shows->original = '/'.$imgUrl;

        }else{
            $shows->thumbnail=$input['thumbnail_url'];
        }
        $shows->project_id = $input['project_id'];
        $shows->purpose = $input['purpose'];
        $shows->price = $input['price'];
        $shows->program = $input['program'];
        $shows->area = $input['area'];
        $shows->times = $input['times'];
        $shows->scale = $input['scale'];
        $shows->guest = $input['guest'];
        if($input['title']==''){
            $shows->title = '路演申请中，暂无标题';
        }else{
            $shows->title=$input['title'];
        }
        $shows->shows_categories_id = $input['shows_categories_id'];
        $shows->video = $input['video'];
        $shows->status = $input['status'];
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