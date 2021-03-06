<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserEditRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Repositories\Contracts\FileRepositoryInterface as FileRepository;
use Config;
use Auth;

class UserController extends Controller
{
    protected $userRepository;

    protected $fileRepository;

    /**
     * UserController constructor.
     * @param $userRepository
     */
    public function __construct(
        UserRepository $userRepository,
        FileRepository $fileRepository
    ) {
        $this->userRepository = $userRepository;
        $this->fileRepository = $fileRepository;
    }

    public function index(Request $request)
    {
        $limit = Config::get('constant.paginate');
        $users = $this->userRepository->getAllUserByKeyword($request->keyword);

        return view('Admin.user.list', ['users' => $users, 'limit' => $limit]);
    }

    public function profile($id = null)
    {
        if ($id) {
            $user = $this->userRepository->find($id);
        } else {
            $user = Auth::user();
        }

        return view('Admin.user.profile', ['user' => $user]);
    }

    public function edit($id = null)
    {
        $user = null;
        $roles = $this->userRepository->getAllRoles();
        if ($id) {
            $user = $this->userRepository->getUserById($id);
        }

        return view('Admin.user.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(UserEditRequest $request, $id = null)
    {
        $user = [
            'username' => $request->username,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'email' => $request->email,
            'role_id' => $request->role,
        ];

        if ($request->file('avatar')) {
            $fileUpload = $this->fileRepository
                ->saveSingleImage($request->file('avatar'), $request->get('orientation', 1), 'users');
            $user['image_id'] = $fileUpload->id;
        }

        if ($id) {
            $this->userRepository->update($id, $user);
        } else {
            $password = $request->password;
            $password = bcrypt($password ? $password : config('constant.default_password'));
            $user['password'] = $password;
            $this->userRepository->create($user);
        }

        return redirect()->route('admin.users.index')->with('success', Config::get('constant.success'));
    }

    public function delete($id)
    {
        $this->userRepository->delete($id);

        return redirect()->route('admin.users.index')->with('success', Config::get('constant.success'));
    }

    public function getRoleTest($user_id)
    {
        $user = $this->userRepository->find($user_id);
        if ($user) {
            $categories = $this->userRepository->getTreeTestsWithRole($user->listTestViewByUser, $user_id);

            return view('Admin.user.roleTest', ['categories' => $categories, 'user' => $user]);
        }

        return redirect()->route('admin.users.index');
    }

    public function postRoleTest(Request $request, $user_id)
    {
        $selectedTestIds = json_decode($request->input('selectedTestIds'));
        $user = $this->userRepository->find($user_id);
        if ($user) {
            if ($this->userRepository->setRoleTest($user_id, $selectedTestIds)) {
                return response()->json([
                    'status' => true,
                    'title' => config('constant.title_action_setRole'),
                    'message' => config('constant.success')
                ]);
            }

            return response()->json([
                'status' => false,
                'title' => config('constant.title_action_setRole'),
                'message' => config('constant.action_fault')
            ]);
        }

        return response()->json([
            'status' => false,
            'title' => config('constant.title_action_setRole'),
            'message' => config('constant.action_use_wrong')
        ]);
    }

    public function getNotifications()
    {
        return auth()->user()->unreadNotifications()->get()->toArray();
    }

    public function readNotify(Request $request)
    {
        if ($request->has('history_id')) {
            return redirect()->route('client.history', ['history_id' => $request->history_id]);
        }
    }
}
