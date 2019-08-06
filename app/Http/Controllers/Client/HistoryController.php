<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Contracts\HistoryRepositoryInterface as HistoryRepository;
use App\Services\TestService;
use Auth;

class HistoryController extends Controller
{
    protected $categoryRepository;

    protected $historyRepository;

    protected $testService;

    public function __construct(
        HistoryRepository $historyRepository,
        CategoryRepository $categoryRepository,
        TestService $testService
    ) {
        $this->historyRepository = $historyRepository;
        $this->categoryRepository = $categoryRepository;
        $this->testService = $testService;
    }

    public function getHistories(Request $request)
    {
        $test_id = $request->test_id;
        $user_id = Auth::user()->id;
        $score = $request->score;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $histories = $this->historyRepository->getHistories($user_id, $test_id, $score, $from_date, $to_date);
        $allCates = $this->categoryRepository->getAllChildCateTests();
        $datas = [
            'test_id' =>$test_id,
            'score' => $score,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'childCategories' => $allCates,
            'histories' => $histories
        ];

        return view('Client.histories', $datas);
    }

    public function getHistory($history_id)
    {
        $user_id = Auth::user()->id;
        $history = $this->testService->getHistory($user_id, $history_id);
        if ($history) {
            return view('Client.history', ['history' => $history]);
        }

        return redirect()->route('home');
    }
}
