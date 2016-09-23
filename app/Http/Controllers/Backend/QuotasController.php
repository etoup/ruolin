<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Http\Requests\IndustriesCreatedRequest;
use App\Http\Requests\IndustriesSearchRequest;
use App\Http\Requests\IndustriesStoreRequest;
use App\Repositories\Industry\IndustriesRepositoryContract;

use App\Http\Requests\QuotasCreatedRequest;
use App\Http\Requests\QuotasSearchRequest;
use App\Http\Requests\QuotasStoreRequest;
use App\Repositories\Quota\QuotasRepositoryContract;


/**
 * Class UsersController
 * @package App\Http\Controllers\Backend
 */
class QuotasController extends Controller
{

    protected $industries;


    public function __construct(IndustriesRepositoryContract $industries){
        $this->industries = $industries;

    protected $quotas;


    public function __construct(QuotasRepositoryContract $quotas){
        $this->quotas = $quotas;

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
        return view('backend.quotas')->withData($this->quotas->getPaginated(10));
    }

    public function search(QuotasSearchRequest $request){
        return view('backend.quotas_search')->withData($this->quotas->getSearchPaginated($request->all(),10));
    }

    public function create(){
        return view('backend.quotas_create');
    }

    public function created(QuotasCreatedRequest $request){
        $this->quotas->created($request->all());
        return redirect()->back()->withFlashSuccess('额度新增成功');
    }

    public function edit($id){
        return view('backend.quotas_edit')->withInfo($this->quotas->findOrThrowException($id));
    }

    public function store(QuotasStoreRequest $request){
        $this->quotas->store($request->all());
        return redirect()->back()->withFlashSuccess('额度更新成功');

    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){

        $this->industries->destroy($id);
        return redirect()->back()->withFlashSuccess('行业删除成功');

        $this->quotas->destroy($id);
        return redirect()->back()->withFlashSuccess('额度删除成功');

    }

}