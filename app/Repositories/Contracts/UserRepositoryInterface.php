<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getAllUserByKeyword($keyword);

    public function getUserById($id);

    public function getAllRoles();

    public function getTreeTestsWithRole($roleTests, $user_id);

    public function setRoleTest($user_id, $selectedTestIds);

    public function getUserHasPermission($permission);
}
