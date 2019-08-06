<?php

namespace App\Repositories\Eloquents;

use App\Models\History;
use App\Models\Question;
use App\Repositories\Contracts\HistoryRepositoryInterface;
use App\User;
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

    public function getHistories($user_id, $test_id = null, $score = null, $from_date = null, $to_date = null)
    {
        $query = $this->_model->with([
            'test',
            'user',
        ])->where('user_id', $user_id)
        ->orderBy('created_at', 'DESC');

        if ($test_id) {
            $query->where('test_id', $test_id);
        }

        if ($score) {
            $query->where('score', '>=', $score);
        }

        if ($from_date) {
            $query->whereDate('created_at', '>=', $from_date);
        }

        if ($to_date) {
            $query->whereDate('created_at', '<=', $to_date);
        }

        return $query->paginate(config('constant.limit_history'));
    }

    public function getHistory($user_id, $history_id)
    {
        $user = User::find($user_id);
        $history = $this->_model->find($history_id);
        if ($history && $history->user_id == $user->id) {
            $seed = $history->random_seed;
            $limit = $history->test->total_question;

            return $this->_model->with([
                'test',
                'test.questions' => function ($query) use ($seed, $limit) {
                    $query->where('questions.deleted_at', null)->inRandomOrder($seed)->limit($limit);
                },
                'test.questions.file',
                'test.questions.answers' => function ($query) use ($seed) {
                    $query->where('answers.deleted_at', null)->inRandomOrder($seed);
                },
                'test.questions.answers.file',
            ])->find($history_id);
        }

        return false;
    }

    public function getQuestionById($question_id)
    {
        return Question::with([
            'file',
            'answers',
            'answers.file',
        ])->find($question_id);
    }
}
