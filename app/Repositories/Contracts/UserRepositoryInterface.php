<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getAllUserByKeyword($keyword);

    public function getUserById($id);
}