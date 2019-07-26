<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TestRepositoryInterface as TestRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use Yajra\Datatables\Datatables;
use Config;

class TestController extends Controller
{
    protected $testRepository;

    protected $categoryRepository;

    /**
     * TestController constructor.
     * @param $testRepository , $categoryRepository
     */
    public function __construct(
        TestRepository $testRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->testRepository = $testRepository;
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.test.list');
    }

    public function getTests()
    {
        $tests = $this->testRepository->getAllTest();

        return Datatables::of($tests)
            ->addColumn('action', function ($test) {
                $data = '<ul class="icons-list">' .
                            '<li>' .
                                '<a href="' . route('tests.edit', ['id' => $test->id]) . '"
                                    data-popup="tooltip" title="' . trans('page.edit') . '">' .
                                '<i class="icon-pencil7"></i></a>' .
                            '</li>' .
                            '<li>' .
                                '<form method="POST" action="' . route('tests.destroy', ['id' => $test->id]) . '">' .
                                    '<input type="hidden" name="_method" value="DELETE">' .
                                    '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
                                    '<button class="btn btn-link" data-popup="tooltip" 
                                            title="' . trans('page.remove') . '">' .
                                        '<i class="icon-trash"></i>' .
                                    '</button>' .
                                '</form>' .
                            '</li>' .
                        '</ul>';
                return $data;
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $allCates = $this->categoryRepository->getTreeCategories();
        if ($request->input('category_id')) {
            $category = $this->categoryRepository->find($request->input('category_id'));
            return view('Admin.test.add', ['category' => $category, 'allCates' => $allCates]);
        }
        return view('Admin.test.add', ['allCates' => $allCates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestRequest $request)
    {
        $test = [
            'name' => $request->name,
            'code' => $request->test_code,
            'content_guide' => $request->content_guide,
            'execute_time' => $request->execute_time,
            'total_question' => $request->total_question,
            'created_user_id' => 1,
            'category_id' => $request->category_id,
            'free' => isset($request->free) ? 1 : 0,
            'publish' => isset($request->publish) ? 1 : 0
        ];
        $this->testRepository->create($test);
        return redirect()->route('tests.index')->with('success', Config::get('constant.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCates = $this->categoryRepository->getTreeCategories();
        $test = $this->testRepository->getTest($id);
        return view('Admin.test.add', ['test' => $test, 'allCates' => $allCates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestRequest $request, $id)
    {
        $test = [
            'name' => $request->name,
            'code' => $request->test_code,
            'content_guide' => $request->content_guide,
            'execute_time' => $request->execute_time,
            'total_question' => $request->total_question,
            'category_id' => $request->category_id,
            'free' => isset($request->free) ? 1 : 0,
            'publish' => isset($request->publish) ? 1 : 0
        ];
        $this->testRepository->update($id, $test);
        return redirect()->route('tests.index')->with('success', Config::get('constant.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->testRepository->delete($id);
        return redirect()->route('tests.index')->with('success', Config::get('constant.success'));
    }
}
