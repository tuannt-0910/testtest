<?php

namespace App\Repositories\Contracts;

interface QuestionRepositoryInterface
{
    public function getAllQuestions();

    public function getQuestion($id);

    public function getSearchByCode($keyword);
}
