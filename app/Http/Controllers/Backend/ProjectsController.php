<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        return view('backend.projects')->withData($this->projects->getUsersPaginated(10));
    }


}