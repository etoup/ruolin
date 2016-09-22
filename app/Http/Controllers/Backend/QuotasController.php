<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndustriesCreatedRequest;
use App\Http\Requests\IndustriesSearchRequest;
use App\Http\Requests\IndustriesStoreRequest;
use App\Repositories\Industry\IndustriesRepositoryContract;

/**
 * Class UsersController
 * @package App\Http\Controllers\Backend
 */
class QuotasController extends Controller
{
    protected $industries;


    public function __construct(IndustriesRepositoryContract $industries){
        $this->industries = $industries;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view('backend.quotas');
    }

    public function search(IndustriesSearchRequest $request){
        return view('backend.industries_search')->withData($this->industries->getSearchPaginated($request->all(),10));
    }

    public function create(){
        return view('backend.industries_create');
    }

    public function created(IndustriesCreatedRequest $request){
        $this->industries->created($request->all());
        return redirect()->back()->withFlashSuccess('行业新增成功');
    }

    public function edit($id){
        return view('backend.industries_edit')->withInfo($this->industries->findOrThrowException($id));
    }

    public function store(IndustriesStoreRequest $request){
        $this->industries->store($request->all());
        return redirect()->back()->withFlashSuccess('行业更新成功');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){
        $this->industries->destroy($id);
        return redirect()->back()->withFlashSuccess('行业删除成功');
    }

}