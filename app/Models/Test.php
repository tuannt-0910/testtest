<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tests';

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
        'category_id',
        'created_user_id',
        'name',
        'code',
        'content_guide',
        'execute_time',
        'total_question',
        'free',
        'publish',
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

    public function createdUser()
    {
        return $this->belongsTo('App\User', 'created_user_id', 'id');
    }

    public function listUserViewTest()
    {
        return $this->belongsToMany('App\User', 'test_user', 'tes_id', 'user_id');
    }

    public function listHistories()
    {
        return $this->hasMany('App\Models\History', 'test_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Model', 'category_id', 'id');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'test_question', 'test_id', 'question_id');
    }
}
