<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\TestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TestQuestionRepositoryInterface as TestQuestionRepository;
use App\Repositories\Contracts\TestRepositoryInterface as TestRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface as CategoryRepository;
use Yajra\Datatables\Datatables;
use Config;
use Auth;

class TestController extends Controller
{
    protected $testRepository;

    protected $categoryRepository;

    protected $testQuestionRepository;

    /**
     * TestController constructor.
     * @param $testRepository , $categoryRepository
     */
    public function __construct(
        TestRepository $testRepository,
        CategoryRepository $categoryRepository,
        TestQuestionRepository $testQuestionRepository
    ) {
        $this->testRepository = $testRepository;
        $this->categoryRepository = $categoryRepository;
        $this->testQuestionRepository = $testQuestionRepository;
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
        $user = Auth::user();

        return Datatables::of($tests)
            ->editColumn('name', function ($test) {
                return '<a href="' . route('tests.show', ['id' => $test->id]) . '">' . $test->name . '</a>';
            })
            ->editColumn('code', function ($test) {
                return '<a href="' . route('tests.show', ['id' => $test->id]) . '">' . $test->code . '</a>';
            })
            ->editColumn('free', function ($test) {
                return $test->free ? 'x' : '';
            })
            ->editColumn('publish', function ($test) {
                return $test->publish ? 'x' : '';
            })
            ->addColumn('action', function ($test) use ($user) {
                $data = '<ul class="icons-list">';
                if ($user->can('edit-test')) {
                    $data .= '<li>' .
                                '<a href="' . route('tests.edit', ['id' => $test->id]) . '"
                                    data-popup="tooltip" title="' . trans('page.edit') . '">' .
                                '<i class="icon-pencil7"></i></a>' .
                            '</li>';
                }

                if ($user->can('remove-test')) {
                    $data .= '<li>' .
                                '<form method="POST" action="' . route('tests.destroy', ['id' => $test->id]) . '">' .
                                    '<input type="hidden" name="_method" value="DELETE">' .
                                    '<input type="hidden" name="_token" value="' . csrf_token() . '">' .
                                    '<button class="btn btn-link" data-popup="tooltip" 
                                            title="' . trans('page.remove') . '">' .
                                        '<i class="icon-trash"></i>' .
                                    '</button>' .
                                '</form>' .
                            '</li>';
                }
                $data .=  '</ul>';

                return $data;
            })
            ->rawColumns(['name', 'code', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::user()->can('add-test')) {
            $allCates = $this->categoryRepository->getTreeCategories();
            if ($request->input('category_id')) {
                $category = $this->categoryRepository->find($request->input('category_id'));

                return view('Admin.test.add', ['category' => $category, 'allCates' => $allCates]);
            }

            return view('Admin.test.add', ['allCates' => $allCates]);
        }

        return redirect()->route('tests.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestRequest $request)
    {
        if (Auth::user()->can('add-test')) {
            $test = [
                'name' => $request->name,
                'code' => $request->test_code,
                'content_guide' => $request->content_guide,
                'execute_time' => $request->execute_time,
                'total_question' => $request->total_question,
                'created_user_id' => Auth::user()->id,
                'category_id' => $request->category_id,
                'free' => isset($request->free) ? 1 : 0,
                'publish' => isset($request->publish) ? 1 : 0,
            ];
            $this->testRepository->create($test);

            return redirect()->route('tests.index')->with('success', Config::get('constant.success'));
        }

        return redirect()->route('tests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = $this->testRepository->find($id);
        $questions = $this->testRepository->getQuestionsByTestId($id);

        return view('Admin.test.show', ['test' => $test, 'questions' => $questions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('edit-test')) {
            $allCates = $this->categoryRepository->getTreeCategories();
            $test = $this->testRepository->getTest($id);

            return view('Admin.test.add', ['test' => $test, 'allCates' => $allCates]);
        }

        return redirect()->route('tests.index');
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
        if (Auth::user()->can('edit-test')) {
            $test = [
                'name' => $request->name,
                'code' => $request->test_code,
                'content_guide' => $request->content_guide,
                'execute_time' => $request->execute_time,
                'total_question' => $request->total_question,
                'category_id' => $request->category_id,
                'free' => isset($request->free) ? 1 : 0,
                'publish' => isset($request->publish) ? 1 : 0,
            ];
            $this->testRepository->update($id, $test);

            return redirect()->route('tests.index')->with('success', Config::get('constant.success'));
        }

        return redirect()->route('tests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = $this->testRepository->find($id);
        if ($test && Auth::user()->can('remove-test')) {
            $this->testRepository->delete($id);

            return redirect()->route('tests.index')->with('success', Config::get('constant.success'));
        }

        return redirect()->route('tests.index');
    }

    public function getChooseAddQuestion($test_id)
    {
        if (Auth::user()->can('choose-question-test')) {
            $test = $this->testRepository->find($test_id);

            return view('Admin.test.chooseQuestion', ['test' => $test]);
        }

        return redirect()->route('tests.index');
    }

    public function postChooseAddQuestion(Request $request, $test_id)
    {
        if (Auth::user()->can('choose-question-test')) {
            $test = $this->testQuestionRepository->find($test_id);
            if ($test && $request->seleted_questions && count($request->seleted_questions) > 0) {
                $tests = [$test_id];
                $questions = $request->seleted_questions;
                $this->testQuestionRepository->createRelationTestsQuestions($tests, $questions);

                return redirect()->route('tests.index')->with('success', Config::get('constant.success'));
            }

            return redirect()->back()->with('action_fault', Config::get('constant.action_fault'));
        }

        return redirect()->route('tests.index');
    }
}
