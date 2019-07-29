<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\QuestionRepositoryInterface as QuestionRepository;
use Yajra\Datatables\Datatables;
use Config;

class QuestionController extends Controller
{
    protected $questionRepository;

    /**
     * QuestionController constructor.
     * @param $questionRepository
     */
    public function __construct(
        QuestionRepository $questionRepository
    ) {
        $this->questionRepository = $questionRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.question.list');
    }

    public function getQuestions()
    {
        $questions = $this->questionRepository->getAllQuestions();

        return Datatables::of($questions)
            ->editColumn('content', function ($question) {
                $content = $question->content;

                if ($question->file) {
                    $url_file = asset($question->file->base_folder . '/' . $question->file->name);
                    if ($question->file->type == 'image') {
                        $content .= '<img class="img-md" src="' . $url_file . '" alt="' . $question->file->name . '"/>';
                    } elseif ($question->file->type == 'audio') {
                        $content .= '<audio src="' . $url_file . '" controls />';
                    }
                }
                return $content;
            })
            ->editColumn('question_type', function ($question) {
                $type = '';
                switch ($question->question_type) {
                    case 'text':
                        $type .= '<span class="' . Config('constant.color.text') . '">';
                        break;
                    case 'image':
                        $type .= '<span class="' . Config('constant.color.image') . '">';
                        break;
                    case 'audio':
                        $type .= '<span class="' . Config('constant.color.audio') . '">';
                        break;
                }
                $type .= $question->question_type . '</span>';
                return $type;
            })
            ->addColumn('action', function ($question) {
                $data = '<ul class="icons-list">' .
                            '<li>' .
                                '<a href="' . route('questions.edit', ['id' => $question->id]) . '"
                                    data-popup="tooltip" title="' . trans('page.edit') . '">' .
                                '<i class="icon-pencil7"></i></a>' .
                            '</li>' .
                            '<li>' .
                    '<form method="POST" action="' . route('questions.destroy', ['id' => $question->id]) . '">' .
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
            ->rawColumns(['content', 'action', 'question_type'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.question.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('Admin.question.edit');
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
        $question = $this->questionRepository->find($id);
        if ($question) {
            $this->questionRepository->delete($id);
            return redirect()->route('questions.index')->with('success', Config::get('constant.success'));
        }
        return redirect()->route('questions.index');
    }
}
