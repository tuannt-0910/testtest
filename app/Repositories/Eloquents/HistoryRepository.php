<?php

namespace App\Repositories\Eloquents;

use App\Models\History;
use App\Repositories\Contracts\HistoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class HistoryRepository extends EloquentRepository implements HistoryRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return History::class;
    }

    public function getRanking($test_id = null)
    {
        $query =  $this->_model->with([
            'user',
            'test',
        ]);
        if ($test_id) {
            $query->where('test_id', $test_id);
        }
        $query->selectRaw('MAX(score) as score, user_id, test_id')
        ->whereNotNull('user_id')
        ->groupBy(['user_id', 'test_id'])
        ->limit(config('constant.limit_ranking'));

        return $query->get();
    }
}
