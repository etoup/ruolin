<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Shows\ShowsRepositoryContract;
use Illuminate\Support\Facades\Auth;


/**
 * Class UsersController
 * @package App\Http\Controllers\Backend
 */
class ShowsController extends Controller
{
    protected $shows;

    /**
     * @param ShowsRepositoryContract $shows
     */
   public function __construct(ShowsRepositoryContract $shows){
        $this->shows = $shows;
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    //路演列表
    public function index()
    {
    /*echo "<pre>";
    print_r($this->shows->getShowsPaginated(8));exit;*/
        return view('backend.show.shows')->withShows($this->shows->getShowsPaginated(8));
    }
    //新增路演
    public function add()
    {
//        dd(Auth ::user());
       return view('backend.show.add');
    }

    public function addOk(Requests\ShowsAddRequest $request){
        $this->shows->created($request->all());
            return redirect()->back()->withFlashSuccess('添加成功');


    }

    //路演修改
    public function edit($id){
        return view('backend.show.edit')->withInfo($this->shows->findOrThrowException($id));
    }

    //修改路演成功
    public function editOk(Requests\ShowsAddRequest $request){

        $this->shows->edit($request->all());

    }

    //删除路演
    public function del($id){
        $this->shows->del($id);
        return redirect()->back()->withFlashSuccess('操作成功');
    }
    //路演分类
    public function categories(){
        return view('backend.shows.categories')->withCate($this->shows->getCategory(5));
    }


}