<?php

namespace App\Repositories\Eloquents;

use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentRepository extends EloquentRepository implements CommentRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Comment::class;
    }

}
