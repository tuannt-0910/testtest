<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

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
        'file_id',
        'question_type',
        'content_suggest',
        'content',
        'code',
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

    public function file()
    {
        return $this->hasOne('App\Models\File', 'id', 'file_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'question_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'question_id', 'id');
    }

    public function tests()
    {
        return $this->belongsToMany('App\Models\Test', 'test_question', 'question_id', 'test_id');
    }

}
