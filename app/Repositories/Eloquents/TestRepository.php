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

    public function getQuestionAnswerResult($testId)
    {
        return $this->_model->with([
            'questions' => function ($query) {
                $query->where('questions.deleted_at', null);
            },
            'questions.file',
            'questions.answers' => function ($query) {
                $query->where('answers.deleted_at', null);
            },
            'questions.answers.file',
        ])->where('id', $testId)->first();
    }

    public function getQuestionAnswerTest($testId, $seed, $limit)
    {
        return $this->_model->with([
            'questions' => function ($query) use ($seed, $limit) {
                $query->where('questions.deleted_at', null)->inRandomOrder($seed)->limit($limit);
            },
            'questions.file',
            'questions.answers' => function ($query) use ($seed) {
                $query->where('answers.deleted_at', null)->inRandomOrder($seed);
            },
            'questions.answers.file',
        ])->where('id', $testId)->first();
    }

    public function getFreeTests()
    {
        return $this->_model->with('category')
            ->where('free', 1)
            ->orderBy('created_at', 'DESC')
            ->limit(config('constant.limit_test_free'))->get();
    }

    public function getNewTests()
    {
        return $this->_model
            ->orderBy('created_at', 'DESC')
            ->limit(config('constant.limit_new_test'))->get();
    }
}
