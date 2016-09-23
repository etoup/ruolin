<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectsCreatedRequest;
use App\Http\Requests\ProjectsSearchRequest;
use App\Http\Requests\ProjectsStoreRequest;
use App\Repositories\Project\ProjectsRepositoryContract;

/**
 * Class UsersController
 * @package App\Http\Controllers\Backend
 */
class ProjectsController extends Controller
{
    protected $projects;

    /**
     * @param ProjectsRepositoryContract $projects
     */
    public function __construct(ProjectsRepositoryContract $projects){
        $this->projects = $projects;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return view('backend.projects')->withData($this->projects->getPaginated(10))->withRegions($this->projects->getRegions());
    }

    public function search(ProjectsSearchRequest $request){
        return view('backend.projects_search')->withData($this->projects->getSearchPaginated($request->all(),10));
    }

    public function create(){
        return view('backend.projects_create')
            ->withRegions($this->projects->getRegions())
            ->withIndustries($this->projects->getIndustries())
            ->withQuotas($this->projects->getQuotas())
            ->withTypes(config('projects.types'))
            ->withHasStores(config('projects.has_stores'));
    }

    public function created(ProjectsCreatedRequest $request){
        $this->projects->created($request->all());
        return redirect()->back()->withFlashSuccess('项目添加成功');
    }

    public function edit($id){
        return view('backend.projects_edit')
            ->withRegions($this->projects->getRegions())
            ->withIndustries($this->projects->getIndustries())
            ->withQuotas($this->projects->getQuotas())
            ->withTypes(config('projects.types'))
            ->withHasStores(config('projects.has_stores'))
            ->withInfo($this->projects->findOrThrowException($id));
    }

    public function store(ProjectsStoreRequest $request){
        $this->projects->store($request->all());
        return redirect()->back()->withFlashSuccess('项目更新成功');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){
        $this->projects->destroy($id);
        return redirect()->back()->withFlashSuccess('项目删除成功');
    }

}