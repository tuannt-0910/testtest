<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Config;
use Illuminate\Database\Query\Builder;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Category::class;
    }

    public function getTreeCategories()
    {
        return $this->_model->where('parent_id', null)->with(['childCategories', 'childCategories.tests'])->get();
    }

    public function getCategories()
    {
        return $this->_model->where('parent_id', null)->with(['childCategories'])->get();
    }

    public function getChildCategories($parentCategoryId)
    {
        return $this->_model->where('parent_id', $parentCategoryId)->get();
    }
}
