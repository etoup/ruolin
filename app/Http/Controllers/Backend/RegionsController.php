<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionsCreatedRequest;
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(){
        return view('backend.regions_create');
    }

    public function created(RegionsCreatedRequest $request){
        $this->regions->created($request->all());
        return redirect()->back()->withFlashSuccess('新增地区成功');
    }


}