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
        $test = $this->testRepository->find($test_id);
        if ($test) {
            $seed = rand(1, 2000000000);
            $test = $this->testRepository->getQuestionAnswerTest($test_id, $seed, $test->total_question);

            return view('Client.test', ['test' => $test]);
        }

        return redirect()->route('home');
    }

    public function postTest(Request $request, $test_id)
    {
        return view('Client.test');
    }
}
