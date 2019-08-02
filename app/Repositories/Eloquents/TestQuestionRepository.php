<?php

namespace App\Repositories\Eloquents;

use App\Models\TestQuestion;
use App\Repositories\Contracts\TestQuestionRepositoryInterface;

class TestQuestionRepository extends EloquentRepository implements TestQuestionRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return TestQuestion::class;
    }

    public function createRelationTestsQuestions($tests, $questions)
    {
        foreach ($tests as $test_id) {
            foreach ($questions as $question_id) {
                $relationByTestQues = $this->_model->where('test_id', $test_id)
                    ->where('question_id', $question_id)->first();

                // check relation exists, not exists to add
                if (!$relationByTestQues) {
                    $testQuestion = [
                        'test_id' => $test_id,
                        'question_id' => $question_id
                    ];

                    $this->create($testQuestion);
                }
            }
        }
    }
}
