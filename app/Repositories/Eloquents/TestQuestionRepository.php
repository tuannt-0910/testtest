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

}
