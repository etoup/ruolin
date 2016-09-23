<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

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
    protected $quotas;


    public function __construct(QuotasRepositoryContract $quotas){
        $this->quotas = $quotas;
    }

    /**
     * @return mixed
     */
    public function index()
    {
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
        $this->quotas->destroy($id);
        return redirect()->back()->withFlashSuccess('额度删除成功');
    }

}