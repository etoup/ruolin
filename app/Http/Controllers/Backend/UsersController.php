<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersStoreRequest;
use App\Repositories\Member\UsersRepositoryContract;
use Illuminate\Support\Facades\Auth;

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
     * @return mixed
     */
    public function index()
    {
        return view('backend.users')->withData($this->users->getUsersPaginated(10,10));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id){
        return view('backend.users_edit')->withInfo($this->users->findOrThrowException($id));
    }

    public function store(UsersStoreRequest $request){
        $this->users->store($request->all());
        return redirect()->back()->withFlashSuccess('用户更新成功');
    }
}