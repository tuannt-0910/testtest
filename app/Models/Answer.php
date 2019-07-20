<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Answer extends Model
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'question_id',
        'content',
        'file_id',
        'answer_type',
        'correct_answer',
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
        return $this->hasOne('App\Models\File', 'file_id', 'id');
    }

    public function questions()
    {
        return $this->belongsTo('App\Models\Question', 'question_id', 'id');
    }
}
