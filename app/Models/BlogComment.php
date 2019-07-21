<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogComment extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_comments';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'blog_id',
        'comment_id',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog', 'blog_id', 'id');
    }

    public function childComments()
    {
        return $this->hasMany('App\Models\BlogComment', 'comment_id', 'id');
    }

    public function parentComments()
    {
        return $this->belongsTo('App\Models\BlogComment', 'comment_id', 'id');
    }
}
