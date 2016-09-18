<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class UsersController
 * @package App\Http\Controllers\Backend
 */
class UsersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('backend');
    }
}