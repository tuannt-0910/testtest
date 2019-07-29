<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FirstLoginRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use Auth;
use Config;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepository $userRepository
    ) {
        $this->middleware('guest')->except('logout');
        $this->userRepository = $userRepository;
    }

    public function getLoginAdmin()
    {
        return view('Admin.login');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if (Auth::user()->active) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('admin.getFirstLogin');
            }
        } else {
            return redirect()->back()
                ->withErrors(['password' => Config::get('constant.input_errors.email_password_wrong')]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
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
            'active' => 1
        ];

        $this->userRepository->update($user->id, $editUser);
        return redirect()->route('admin.home');
    }
}
