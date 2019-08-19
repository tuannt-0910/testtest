<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CommentRepositoryInterface as CommentRepository;
use Auth;
use Yajra\Datatables\Datatables;

class CommentController extends Controller
{
    protected $commentRepository;

    /**
     * CommentController constructor.
     * @param $commentRepository
     */
    public function __construct(
        CommentRepository $commentRepository
    ) {
        $this->commentRepository = $commentRepository;
    }

    public function index()
    {
        return view('Admin.comment.index');
    }

    public function getComments()
    {
        $comments = $this->commentRepository->getAllComments();

        return Datatables::of($comments)
            ->editColumn('code', function ($comment) {
                return '<a href="' . route('questions.show', ['id' => $comment->question->id]) . '">' .
                    $comment->question->code . '</a>';
            })
            ->addColumn('author', function ($comment) {
                return $comment->user->username;
            })
            ->addColumn('question_content', function ($comment) {
                $content = $comment->question->content;

                if ($comment->question->file) {
                    $url_file = asset($comment->question->file->base_folder . '/' . $comment->question->file->name);
                    if ($comment->question->file->type == 'image') {
                        $content .= '<img class="img-md" src="' . $url_file . '" alt="' .
                            $comment->question->file->name . '"/>';
                    } elseif ($comment->question->file->type == 'audio') {
                        $content .= '<audio src="' . $url_file . '" controls />';
                    }
                }

                return $content;
            })
            ->rawColumns(['name', 'code', 'question_content'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('add-command')) {
            $comment = [
                'content' => strip_tags(trim($request->input('content'))),
                'user_id' => Auth::user()->id,
                'question_id' => addslashes($request->input('question_id')),
            ];
            $comment = $this->commentRepository->create($comment)->load(['user']);
            $data = [
                'comment' => $comment,
                'urlDestroy' => route('comments.destroy', ['id' => $comment->id]),
            ];

            return response()->json($data);
        }

        return response()->json(false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('remove-command')) {
            $checkDelete = $this->commentRepository->delete($id);

            return response()->json($checkDelete);
        }

        return response()->json(false);
    }
}
