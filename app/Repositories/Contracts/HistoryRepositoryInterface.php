<?php

namespace App\Repositories\Contracts;

interface HistoryRepositoryInterface
{
    public function getRanking($test_id);

    public function getHistories($user_id, $test_id = null, $score = null, $from_date = null, $to_date = null);

    public function getHistory($user_id, $history_id);

    public function getQuestionById($question_id);
}
