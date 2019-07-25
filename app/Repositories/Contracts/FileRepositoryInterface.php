<?php

namespace App\Repositories\Contracts;

interface FileRepositoryInterface
{
    public function saveSingleImage($photo, $orientation, $category);
}
