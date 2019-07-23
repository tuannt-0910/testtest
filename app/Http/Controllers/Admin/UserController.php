<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use Config;

class UserController extends Controller
{
    protected $userRepository;

    /**
     * UserController constructor.
     * @param $userRepository
     */
    public function __construct
    (
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $limit = Config::get('constant.paginate');
        $users = $this->userRepository->getAllUserByKeyword($request->keyword);
        return view('Admin.user.list', ['users' => $users, 'limit' => $limit]);
    }

    public function edit($id)
    {
        $user = $this->userRepository->getUserById($id);
        return view('Admin.user.edit', ['user' => $user]);
    }
}
