<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasPermissionsTrait;

class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait;

    use SoftDeletes;

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
        'username',
        'firstname',
        'lastname',
        'name',
        'email',
        'phone',
        'address',
        'birthday',
        'active',
        'image_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function file()
    {
        return $this->hasOne('App\Models\File', 'id', 'image_id');
    }

    public function listTestViewByUser()
    {
        return $this->belongsToMany('App\Models\Test', 'test_user', 'user_id', 'test_id');
    }

    public function createdTests()
    {
        return $this->hasMany('App\Models\Test', 'created_user_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany('App\Models\History', 'user_id', 'id');
    }

    public function blogs()
    {
        return $this->hasMany('App\Models\Blog', 'created_user_id', 'id');
    }

    public function feedbacks()
    {
        return $this->hasMany('App\Models\Feedback', 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments', 'user_id', 'id');
    }

    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }
}
