<?php

namespace App\Repositories\Eloquents;

use App\Models\Question;
use App\Repositories\Contracts\QuestionRepositoryInterface;

class QuestionRepository extends EloquentRepository implements QuestionRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Question::class;
    }

    public function getAllQuestions()
    {
        return $this->_model->with(['file'])->get();
    }

    public function getQuestion($id)
    {
        return $this->_model->with([
            'file',
            'comments',
            'comments.user',
            'answers',
            'comments',
            'answers.file'
        ])->find($id);
    }
}
