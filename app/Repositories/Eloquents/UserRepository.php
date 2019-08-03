<?php

namespace App\Repositories\Eloquents;

use App\Models\Category;
use App\Models\Role;
use App\Models\Test;
use App\Models\TestQuestion;
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

    public function getTreeTestsWithRole($roleTests, $user_id)
    {
        return Category::where('parent_id', null)->with([
            'childCategories',
            'childCategories.tests',
            'childCategories.tests.listUserViewTest' => function ($query) use ($user_id) {
                $query->where('users.id', $user_id);
            }
        ])->get();
    }

    public function setRoleTest($user_id, $selectedTestIds)
    {
        TestQuestion::whereNotIn('id', $selectedTestIds)->delete();
    }
}
