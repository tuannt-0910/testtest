<?php

namespace App\Services;

use App\Repositories\Contracts\TestRepositoryInterface as TestRepository;
use App\Repositories\Contracts\HistoryRepositoryInterface as HistoryRepository;

class TestService
{
    protected $testRepository;

    protected $historyRepository;

    public function __construct(
        TestRepository $testRepository,
        HistoryRepository $historyRepository
    ) {
        $this->testRepository = $testRepository;
        $this->historyRepository = $historyRepository;
    }

    public function getResult($request, $seed, $test_id, $user_id)
    {
        $test = $this->testRepository->find($test_id);
        if ($test) {
            $test = $this->testRepository->getQuestionAnswerTest($test_id, $seed, $test->total_question);

            return $this->scoreTest($request, $seed, $test_id, $user_id, $test);
        }

        return false;
    }

    public function scoreTest($request, $seed, $test_id, $user_id, $test)
    {
        $score = 0;
        $duration = $request->input('duration');
        $wrongQuestions = [];

        foreach ($test->questions as $index => $question) {
            $chosen_answer = $request->input('keyQuestions_' . $question->id);
            $historyQuestion = [
                'no' => $index + 1,
                'question_id' => $question->id,
                'chosen_answer' => $chosen_answer,
            ];
            $test->questions[$index]->chosen_answer = $chosen_answer;
            $test->questions[$index]->correct = false;

            foreach ($question->answers as $answer) {
                if ($answer->correct_answer) {
                    if ($answer->id == $chosen_answer) {
                        $test->questions[$index]->correct = true;
                        $score++;
                    } else {
                        array_push($wrongQuestions, $historyQuestion);
                    }
                    break;
                }
            }
        }

        $test->correctNumber = $score;
        $score = floor($score / $test->total_question * 100);
        $wrongQuestions = json_encode($wrongQuestions);
        $history = [
            'test_id' => $test_id,
            'user_id' => $user_id,
            'duration' => $duration,
            'random_seed' => $seed,
            'score' => $score,
            'user_answer' => $wrongQuestions
        ];
        $history = $this->historyRepository->create($history);
        $test->history = $history;

        return $test;
    }
}
