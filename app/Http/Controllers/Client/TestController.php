<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TestRepositoryInterface as TestRepository;
use App\Repositories\Contracts\CommentRepositoryInterface as CommentRepository;
use App\Services\TestService;
use Auth;

class TestController extends Controller
{
    protected $testRepository;

    protected $testService;

    protected $commentRepository;

    public function __construct(
        TestRepository $testRepository,
        TestService $testService,
        CommentRepository $commentRepository
    ) {
        $this->testRepository = $testRepository;
        $this->testService = $testService;
        $this->commentRepository = $commentRepository;
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

    public function getResult($test_id)
    {
        $test = $this->testRepository->getQuestionAnswerResult($test_id);
        if ($test) {
            return view('Client.testResult', ['test' => $test]);
        }

        return redirect()->route('home');
    }

    public function getTest($test_id)
    {
        $test = $this->testRepository->find($test_id);
        if ($test) {
            $seed = rand(1, 2000000000);
            $test = $this->testRepository->getQuestionAnswerTest($test_id, $seed, $test->total_question);

            session()->put('test_seed', $seed);

            return view('Client.test', ['test' => $test]);
        }

        return redirect()->route('home');
    }

    public function postTest(Request $request, $test_id)
    {
        $seed = session('test_seed');
        $user_id = null;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }
        $result = $this->testService->getResult($request, $seed, $test_id, $user_id);

        return view('Client.result', ['test' => $result]);
    }

    public function postCommand(Request $request, $question_id)
    {
        if (Auth::user()->can('add-command')) {
            $comment = [
                'content' => $request->input('content'),
                'user_id' => Auth::user()->id,
                'question_id' => $request->input('question_id'),
            ];
            $comment = $this->commentRepository->create($comment)->load(['user']);
            $data = [
                'comment' => $comment,
                'urlDestroy' => route('comments.destroy', ['id' => $comment->id]),
            ];

            return response()->json($data);
        }

        return response()->json(false);
    }
}
