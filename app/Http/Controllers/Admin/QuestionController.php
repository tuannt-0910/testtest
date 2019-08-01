<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\QuestionRepositoryInterface as QuestionRepository;
use App\Repositories\Contracts\AnswerRepositoryInterface as AnswerRepository;
use App\Repositories\Contracts\FileRepositoryInterface as FileRepository;
use Yajra\Datatables\Datatables;
use Config;

class QuestionController extends Controller
{
    protected $questionRepository;

    protected $fileRepository;

    protected $answerRepository;

    /**
     * QuestionController constructor.
     * @param $questionRepository
     */
    public function __construct(
        QuestionRepository $questionRepository,
        FileRepository $fileRepository,
        AnswerRepository $answerRepository
    ) {
        $this->questionRepository = $questionRepository;
        $this->fileRepository = $fileRepository;
        $this->answerRepository = $answerRepository;
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
            ->editColumn('code', function ($question) {
                $code = '<a href="' . route('questions.show', ['id' => $question->id]) . '">' .
                    $question->code . '</a>';

                return $code;
            })
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
            ->rawColumns(['code', 'content', 'action', 'question_type'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.question.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = $this->saveQuestion($request);

        for ($i = 1; $i <= 4; $i++) {
            if ($request->input('answer_content_' . $i) || $request->input('answer_file_' . $i)) {
                $this->saveAnswer(
                    $request,
                    $question->id,
                    'answer_content_' . $i,
                    'answer_file_' . $i,
                    $i == $request->input('key') ? 1 : 0,
                    $i <= count($question->answers) ? $question->answers[$i - 1]->id : null
                );
            }
        }

        return redirect()->route('questions.show', ['id' => $question->id])
            ->with('success', Config::get('constant.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->questionRepository->getQuestion($id);
        if ($question) {
            return view('Admin.question.question', ['question' => $question]);
        } else {
            return redirect()->route('questions.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = $this->questionRepository->find($id);
        if ($question) {
            return view('Admin.question.edit', ['question' => $question]);
        } else {
            return redirect()->route('questions.index');
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
        $question = $this->questionRepository->find($id);
        if ($question) {
            $this->saveQuestion($request, $id);

            for ($i = 1; $i <= 4; $i++) {
                if ($request->input('answer_content_' . $i) || $request->input('answer_file_' . $i)) {
                    $this->saveAnswer(
                        $request,
                        $id,
                        'answer_content_' . $i,
                        'answer_file_' . $i,
                        $i == $request->input('key') ? 1 : 0,
                        $i <= count($question->answers) ? $question->answers[$i - 1]->id : null
                    );
                } elseif ($i <= count($question->answers)) {
                    $this->answerRepository->delete($question->answers[$i - 1]->id);
                }
            }

            return redirect()->route('questions.show', ['id' => $id])->with('success', Config::get('constant.success'));
        } else {
            return redirect()->route('questions.index');
        }
    }

    public function saveQuestion($request, $id = null)
    {
        $question_type = 'text';
        switch ($request->input('question_type')) {
            case 2:
                $question_type = 'image';
                $fileUpload = $this->fileRepository
                    ->saveSingleImage($request->file('image'), $request->get('orientation', 1), 'question/' . $id);
                break;
            case 3:
                $question_type = 'audio';
                $fileUpload = $this->fileRepository
                    ->saveSingleAudio($request->file('image'), 'question/' . $id);
                break;
        }

        $question = [
            'code' => $request->input('code'),
            'content_suggest' => $request->input('content_suggest'),
            'content' => $request->input('content'),
            'question_type' => $question_type,
            'file_id' => isset($fileUpload) ? $fileUpload->id : null,
        ];

        if ($id) {
            return $this->questionRepository->update($id, $question);
        } else {
            return $this->questionRepository->create($question);
        }
    }

    public function saveAnswer($request, $question_id, $inputContentName, $inputFileName, $correct_answer, $id = null)
    {
        if ($request->file($inputFileName)) {
            $fileUpload = $this->fileRepository
                ->saveSingleImage(
                    $request->file($inputFileName),
                    $request->get('orientation', 1),
                    'question/' . $question_id
                );
        }

        $answer = [
            'content' => $request->input($inputContentName),
            'question_id' => $question_id,
            'file_id' => isset($fileUpload) ? $fileUpload->id : null,
            'correct_answer' => $correct_answer,
        ];

        if ($id) {
            $this->answerRepository->update($id, $answer);
        } else {
            $this->answerRepository->create($answer);
        }
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
