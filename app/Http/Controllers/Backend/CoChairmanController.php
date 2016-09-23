<?php
namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Cochairman\CochairmanRepositoryContract;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class CochairmanController
 * @package App\Http\Controllers\Backend
 */
class CochairmanController extends Controller
{
    protected $cochairman;

    /**
     * @param CochairmanRepositoryContract $cochairman
     */
   public function __construct(CochairmanRepositoryContract $cochairman){
        $this->Cochairman = $cochairman;
    }

    /**
     * Cochairman the application dashboard.
     *
     * @return Response
     */
    //联董列表
    public function index()
    {
    /*echo "<pre>";
    print_r($this->Cochairman->getCochairmanPaginated(8));exit;*/
        return view('backend.Cochairman.Cochairman')->withCochairman($this->Cochairman->getCochairmanPaginated(8));
    }

    //审核列表
    public function review()
    {
        /*echo "<pre>";
        print_r($this->Cochairman->getCochairmanPaginated(8));exit;*/
        return view('backend.Cochairman.review')->withCochairman($this->Cochairman->getReviewPaginated(8));
    }

    //新增联董
    public function add()
    {
//        dd(Auth ::user());
       return view('backend.Cochairman.add');
    }

    public function addOk(Requests\CochairmanAddRequest $request){
        $this->Cochairman->created($request->all());
            return redirect()->route('backend.Cochairman')->withFlashSuccess('添加成功');
    }

    public function reviewOk($id,$review){
        //echo $id;exit;
        $this->Cochairman->reviewed($id,$review);
        return redirect()->route('backend.Cochairman')->withFlashSuccess('审核成功');
    }
    

    //联董修改
    public function edit($id){
        return view('backend.Cochairman.edit')->withInfo($this->Cochairman->findOrThrowException($id));
    }

    //修改联董成功
    public function editOk(Requests\CochairmanEditRequest $request){
/*        dd($request);exit;*/
        $this->Cochairman->edit($request->all());
        return redirect()->route('backend.Cochairman')->withFlashSuccess('修改成功');

    }

    //删除联董
    public function del($id){
        $this->Cochairman->del($id);
        return redirect()->back()->withFlashSuccess('删除成功');
    }

    //删除联董
    public function destroy($id){
        $this->Cochairman->destroy($id);
        return redirect()->back()->withFlashSuccess('删除成功');
    }
    //联董分类
//    public function categories(){
//        return view('backend.Cochairman.categories')->withCate($this->Cochairman->getCategory(10));
//    }
//
//    //新增联董分类
//    public function addCate(Requests\CochairmanAddCateRequest $request){
//        $this->Cochairman->addCate($request->all());
//        return redirect()->route('backend.Cochairman.categories')->withFlashSuccess('添加成功');
//
//    }
//    //定义分类修改
//    public function editCate($id){
//        return view('backend.Cochairman.editCate')->withInfo($this->Cochairman->findOne($id));
//    }
//
//    public function editCateOk(Requests\CochairmanEditCateRequest $request){
//        $this->Cochairman->editCate($request->all());
//        return redirect()->route('backend.Cochairman.categories')->withFlashSuccess('修改成功');
//    }
//
//    //定义联董分类删除
//    public function delCate($id){
//        $this->Cochairman->delCate($id);
//        return redirect()->back()->withFlashSuccess('删除成功');
//    }
}