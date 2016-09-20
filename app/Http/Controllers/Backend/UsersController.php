<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Member\UsersRepositoryContract;

/**
 * Class UsersController
 * @package App\Http\Controllers\Backend
 */
class UsersController extends Controller
{
    protected $users;

    /**
     * @param UsersRepositoryContract $users
     */
    public function __construct(UsersRepositoryContract $users){
        $this->users = $users;
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('backend.users')->withUsers($this->users->getUsersPaginated(10,80));
    }
}