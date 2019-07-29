<?php

namespace App\Repositories\Eloquents;

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
}