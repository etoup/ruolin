<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Shows\ShowsRepositoryContract;


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
    /*  echo "<pre>";
       print_r($this->shows->getShowsPaginated(8));exit;;*/
        return view('backend.shows')->withShows($this->shows->getShowsPaginated(8));
    }
    //新增路演
    public function addShows()
    {
       return view('backend.addShows');
    }

    //路演修改
    public function editShows(){

    }

    //路演分类
    public function categories(){
        
        return view('backend.shows_categories')->withCate($this->shows->getCategory(5));
    }

    //路演审核
    public function review(){
        return view('backend.shows_review');
    }
}