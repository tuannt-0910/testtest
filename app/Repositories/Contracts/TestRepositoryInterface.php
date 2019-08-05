<?php

namespace App\Repositories\Contracts;

interface TestRepositoryInterface
{
    public function getAllTest();

    public function getTest($id);

    public function getQuestionsByTestId($id);

    public function getTestInCategory($categoryId);

    public function getQuestionAnswerTest($testId, $seed, $limit);
}
