<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Contracts\TestRepositoryInterface as TestRepository;

class CategoryController extends Controller
{
    protected $categoryRepository;

    protected $testRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        TestRepository $testRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->testRepository = $testRepository;
    }

    public function getCategories($category_id)
    {
        $category = $this->categoryRepository->find($category_id);
        if ($category && !$category->parent_id) {
            $childCategories = $this->categoryRepository->getChildCategories($category_id);

            return view('Client.categories', ['childCategories' => $childCategories]);
        }

        return redirect()->route('home');
    }

    public function getTests($category_id)
    {
        $category = $this->categoryRepository->find($category_id);
        if ($category && $category->parent_id) {
            $tests = $this->testRepository->getTestInCategory($category_id);

            return view('Client.tests', ['tests' => $tests]);
        }

        return redirect()->route('home');
    }
}
