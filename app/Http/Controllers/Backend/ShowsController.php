<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Shows\ShowsRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Annotation\Route;


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
        //获取项目
        $projects=$this->shows->getProject();
        //获取分类
        $info = $this->shows->getCate();
        $infoArr = [];
        if(count($info)){
            foreach ($info as $v){
                $infoArr[$v->id] = $v->title;
            }
        }
       return view('backend.show.add')->withData($projects)->withInfo($infoArr);
    }

    public function addOk(Requests\ShowsAddRequest $request){

        $this->shows->created($request->all());
            return redirect()->route('backend.shows')->withFlashSuccess('添加成功');
    }

    //路演修改
    public function edit($id){
        $infoAll = $this->shows->getCate();
        $projects=$this->shows->getProject();
        $infoArr = [];
        if(count($infoAll)){
            foreach ($infoAll as $v){
                $infoArr[$v->id] = $v->title;
            }
        }
        /*echo "<pre/>";
        print_r($infoArr);exit;*/
        return view('backend.show.edit')->withCate($infoArr)->withData($projects)->withInfo($this->shows->findOrThrowException($id));
    }

    //修改路演成功
    public function editOk(Requests\ShowsEditRequest $request){
        
/*        dd($request);exit;*/
        $this->shows->edit($request->all());
        return redirect()->route('backend.shows')->withFlashSuccess('修改成功');

    }

    //删除路演
    public function del($id){
        $this->shows->del($id);
        return redirect()->back()->withFlashSuccess('删除成功');
    }
    //路演分类
    public function categories(){
        return view('backend.show.categories')->withCate($this->shows->getCategory(10));
    }

    //新增路演分类
    public function addCate(Requests\ShowsAddCateRequest $request){
        $this->shows->addCate($request->all());
        return redirect()->route('backend.shows.categories')->withFlashSuccess('添加成功');

    }
    //定义分类修改
    public function editCate($id){
        return view('backend.show.editCate')->withInfo($this->shows->findOne($id));
    }

    public function editCateOk(Requests\ShowsEditCateRequest $request){
        $this->shows->editCate($request->all());
        return redirect()->route('backend.shows.categories')->withFlashSuccess('修改成功');
    }

    //定义路演分类删除
    public function delCate($id){
        $this->shows->delCate($id);
        return redirect()->back()->withFlashSuccess('删除成功');
    }

    //定义路演审核方法
    public function review($id){
        
    }


}