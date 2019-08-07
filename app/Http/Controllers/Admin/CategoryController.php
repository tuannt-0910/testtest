<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use App\Repositories\Contracts\FileRepositoryInterface as FileRepository;
use Config;
use Auth;

class CategoryController extends Controller
{
    protected $categoryRepository;

    protected $fileRepository;

    /**
     * CategoryController constructor.
     * @param $categoryRepository , $fileRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        FileRepository $fileRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->fileRepository = $fileRepository;
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

        if ($parentCategory && Auth::user()->can('add-category')) {
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
        if (Auth::user()->can('add-category')) {
            $newCategory = [
                'name' => $request->name,
                'parent_id' => $request->parent_id,
            ];
            $this->categoryRepository->create($newCategory);

            $categories = $this->categoryRepository->getTreeCategories();

            return view('Admin.category.list', ['categories' => $categories])
                ->with('success', Config::get('constant.success'));
        }

        return redirect()->route('categories.index');
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

        if ($category && Auth::user()->can('edit-category')) {
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
    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoryRepository->find($id);

        if ($category && Auth::user()->can('edit-category')) {
            $updateCategory = [
                'name' => $request->name
            ];

            if (!$category->parent_id && $request->file('image_category')) {
                $fileUpload = $this->fileRepository
                    ->saveSingleImage($request->file('image_category'), $request->get('orientation', 1), 'category');
                $updateCategory['image_id'] = $fileUpload->id;
            }

            $this->categoryRepository->update($id, $updateCategory);

            return redirect()->route('categories.index')->with('success', Config::get('constant.success'));
        }

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if ($category && $category->parent_id && Auth::user()->can('remove-category')) {
            $this->categoryRepository->delete($id);

            return redirect()->route('categories.index')->with('success', Config::get('constant.success'));
        }

        return redirect()->route('categories.index');
    }
}
