<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function file()
    {
        return $this->hasOne('App\Models\File', 'image_id', 'id');
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

    public function roles()
    {
        return $this->hasOne('App\Models\Role', 'role_id', 'id');
    }
}
