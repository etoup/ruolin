<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectsCreatedRequest;
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

}