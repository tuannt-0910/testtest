<?php

namespace App\Repositories\Eloquents;

use App\Models\Question;
use App\Models\Test;
use App\Repositories\Contracts\TestRepositoryInterface;
use Config;

class TestRepository extends EloquentRepository implements TestRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Test::class;
    }

    public function getAllTest()
    {
        return $this->_model->with(['createdUser', 'category'])->get();
    }

    public function getTest($id)
    {
        return $this->_model->with(['createdUser', 'category'])->find($id);
    }

    public function getQuestionsByTestId($id)
    {
        return Question::with([
            'tests' => function ($query) use ($id) {
                $query->where('tests.id', $id);
            },
            'file',
            'answers.file',
            'comments'
        ])->whereHas('tests', function ($query) use ($id) {
            $query->where('tests.id', $id);
        })->paginate(config('constant.limit_questions_test'));
    }

    public function getTestInCategory($categoryId)
    {
        return $this->_model->where('category_id', $categoryId)->get();
    }
}
