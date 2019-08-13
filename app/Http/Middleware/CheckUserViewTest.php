<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\Contracts\TestRepositoryInterface as TestRepository;

class CheckUserViewTest
{
    protected $tesRepository;

    /**
     * CheckUserViewTest constructor.
     * @param $tesRepository
     */
    public function __construct(TestRepository $tesRepository)
    {
        $this->tesRepository = $tesRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $test_id = $request->test_id;
        $test = $this->tesRepository->find($test_id);
        $user = $request->user();
        if ($test) {
            //check login
            if ($user) {
                if ($user->can('view-result')) {
                    //admin

                    return redirect()->route('client.test.getResult', ['test_id' => $test_id]);
                } elseif ($user->hasPermissionViewTest($test_id) || $test->free) {
                    // permission view test

                    return $next($request);
                }
                //no permission

                return redirect()->route('home');
            } elseif ($test->free) {
                //not login, test free

                return $next($request);
            }

            return redirect()->route('client.getLogin');
        }

        return redirect()->route('home');
    }
}
