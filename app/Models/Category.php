<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

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
        'parent_id',
        'name',
        'image_id',
        'content_guide',
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

    public function childCategories()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function parentCategories()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    }

    public function file()
    {
        return $this->hasOne('App\Models\File', 'id', 'image_id');
    }

    public function tests()
    {
        return $this->hasMany('App\Models\Test', 'category_id', 'id');
    }
}
