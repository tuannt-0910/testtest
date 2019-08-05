<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getTreeCategories();

    public function getCategories();
}
