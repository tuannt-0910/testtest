<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Http\Requests\FirstLoginRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use Config;

class FirstLoginController extends Controller
{
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->middleware('auth');
        $this->middleware('passedFirstLogin');
        $this->userRepository = $userRepository;
    }

    public function getFirstLoginAdmin()
    {
        return view('Admin.firstLogin');
    }

    public function postFirstLogin(FirstLoginRequest $request)
    {
        $user = Auth()->user();
        if (!(Hash::check($request->old_password, $user->password))) {
            return redirect()->back()
                ->withErrors(['old_password' => Config::get('constant.input_errors.old_password_wrong')]);
        }

        $editUser = [
            'password' => bcrypt($request->new_password),
            'active' => Config::get('constant.active'),
        ];

        $this->userRepository->update($user->id, $editUser);

        return redirect()->route('admin.home');
    }
}
