<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\CommentRepositoryInterface as CommentRepository;
use Auth;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = [
            'content' => $request->input('content'),
            'user_id' => Auth::user()->id,
            'question_id' => $request->input('question_id')
        ];
        $comment = $this->commentRepository->create($comment)->load(['user']);
        $data = [
            'comment' => $comment,
            'urlDestroy' => route('comments.destroy', ['id' => $comment->id]),
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkDelete = $this->commentRepository->delete($id);

        return response()->json($checkDelete);
    }
}
