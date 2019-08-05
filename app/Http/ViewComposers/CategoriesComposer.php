<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;

class CategoriesComposer
{
    protected $categories = [];

    protected $categoryRepository;

    /**
     * Create a movie composer.
     *
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categories = $this->categoryRepository->getCategories();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', end($this->categories));
    }
}
