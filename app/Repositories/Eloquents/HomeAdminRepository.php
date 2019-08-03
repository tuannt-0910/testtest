<?php

namespace App\Repositories\Eloquents;

use App\Models\Comment;
use App\Models\History;
use App\Models\Test;
use App\Repositories\Contracts\HomeAdminRepositoryInterface;
use App\User;
use Carbon\Carbon;

class HomeAdminRepository extends EloquentRepository implements HomeAdminRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    public function getCountUsers()
    {
        return $this->_model->count();
    }

    public function getCountTests()
    {
        return Test::count();
    }

    public function getCountTestHistories()
    {
        return History::count();
    }

    public function getCountComments()
    {
        return Comment::count();
    }

    public function getStaticalTested()
    {
        $now = Carbon::now();
        $this_year = $now->year;
        $startOfWeek = $now->startOfWeek()->format('Y-m-d H:i:s');
        $endOfWeek = $now->endOfWeek()->format('Y-m-d H:i:s');
        $this_month = $now->month;

        $staticals['this_week'] = History::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $staticals['this_month'] = History::whereMonth('created_at', $this_month)->count();
        $staticals['this_year'] = History::whereYear('created_at', $this_year)->count();

        return $staticals;
    }

    public function getHistoryChart()
    {
        $staticals = [
            'tested' => [
                0 => trans('page.dashboard.name_tested'),
            ],
            'tests' => [
                0 => trans('page.dashboard.name_tests'),
            ],
        ];
        for ($month = 1; $month < 13; $month++) {
            $staticals['tested'][$month] = History::whereMonth('created_at', $month)->count();
            $staticals['tests'][$month] = Test::whereMonth('created_at', $month)->count();
        }

        $staticals['tested'] = json_encode($staticals['tested']);
        $staticals['tests'] = json_encode($staticals['tests']);

        return $staticals;
    }
}
