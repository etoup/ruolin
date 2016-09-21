<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionsCreatedRequest;
use App\Http\Requests\RegionsSearchRequest;
use App\Http\Requests\RegionsStoreRequest;
use App\Repositories\Region\RegionsRepositoryContract;

/**
 * Class UsersController
 * @package App\Http\Controllers\Backend
 */
class RegionsController extends Controller
{
    protected $regions;


    public function __construct(RegionsRepositoryContract $regions){
        $this->regions = $regions;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view('backend.Regions')->withData($this->regions->getRegionsPaginated(10));
    }

    /**
     * @param RegionsSearchRequest $request
     * @return mixed
     */
    public function search(RegionsSearchRequest $request)
    {
        return view('backend.regions_search')->withData($this->regions->getRegionsSearchPaginated($request->all(),10));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('backend.regions_create');
    }

    /**
     * @param RegionsCreatedRequest $request
     * @return mixed
     */
    public function created(RegionsCreatedRequest $request){
        $this->regions->created($request->all());
        return redirect()->back()->withFlashSuccess('新增地区成功');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('backend.regions_edit')->withInfo($this->regions->findOrThrowException($id));
    }

    public function store(RegionsStoreRequest $request){
        $this->regions->store($request->all());
        return redirect()->back()->withFlashSuccess('更新地区成功');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){
        $this->regions->destroy($id);
        return redirect()->back()->withFlashSuccess('地区删除成功');
    }

}