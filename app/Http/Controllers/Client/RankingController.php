<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\HistoryRepositoryInterface as HistoryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;

class RankingController extends Controller
{
    protected $historyRepository;

    protected $categoryRepository;

    public function __construct(
        HistoryRepository $historyRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->historyRepository = $historyRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getRanking(Request $request)
    {
        $test_id = $request->test_id;
        $allCates = $this->categoryRepository->getAllChildCateTests();
        $rankings = $this->historyRepository->getRanking($request->test_id);

        return view('Client.ranking', ['rankings' => $rankings, 'childCategories' => $allCates, 'test_id' => $test_id]);
    }
}
