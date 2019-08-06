<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getTreeCategories();

    public function getCategories();

    public function getChildCategories($parentCategory_id);

    public function getAllChildCateTests();
}
