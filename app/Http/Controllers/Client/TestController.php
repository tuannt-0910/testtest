<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TestRepositoryInterface as TestRepository;

class TestController extends Controller
{
    protected $testRepository;

    public function __construct(
        TestRepository $testRepository
    ) {
        $this->testRepository = $testRepository;
    }

    public function getGuideTest($test_id)
    {
        $test = $this->testRepository->find($test_id);
        if ($test) {
            if ($test->content_guide) {
                return view('Client.guideTest', ['test' => $test]);
            } else {
                return redirect()->route('client.test.get', ['test_id' => $test_id]);
            }
        }

        return redirect()->route('home');
    }

    public function getTest($test_id)
    {
        return view('Client.test');
    }

    public function postTest(Request $request, $test_id)
    {
        return view('Client.test');
    }
}
