<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;

class CategoryController extends Controller
{
    protected $categoryRepository;

    /**
     * CategoryController constructor.
     */
    public function __construct
    (
        CategoryRepository $categoryRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->getTreeCategories();
        return view('Admin.category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $parentCategory = $this->categoryRepository->find($request->parent_id);

        if ($parentCategory) {
            return view('Admin.category.add', ['parentCategory' => $parentCategory]);
        } else {
            return redirect()->route('categories.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $newCategory = [
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ];
        $this->categoryRepository->create($newCategory);

        $categories = $this->categoryRepository->getTreeCategories();
        return view('Admin.category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if ($category) {
            return view('Admin.category.edit', ['category' => $category]);
        } else {
            return redirect()->route('categories.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
