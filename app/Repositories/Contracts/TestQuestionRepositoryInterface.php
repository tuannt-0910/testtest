<?php

namespace App\Repositories\Contracts;

interface TestQuestionRepositoryInterface
{
    public function createRelationTestsQuestions($tests, $questions);
}
