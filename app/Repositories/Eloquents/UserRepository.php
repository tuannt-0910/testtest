<?php

namespace App\Repositories\Eloquents;

use App\Models\Role;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Config;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }

    public function getAllUserByKeyword($keyword)
    {
        return $this->_model
            ->where('firstname', 'like', '%' . $keyword . '%')
            ->orWhere('lastname', 'like', '%' . $keyword . '%')
            ->orWhere('username', 'like', '%' . $keyword . '%')
            ->with(['file', 'role'])->paginate(Config::get('constant.paginate'));
    }

    public function getUserById($id)
    {
        return $this->_model->with(['file', 'role'])->find($id);
    }

    public function getAllRoles()
    {
        return Role::select('id', 'name', 'slug')->where('deleted_at', null)->get();
    }
}