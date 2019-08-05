<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getCategories($category_id)
    {
        return view('Client.categories');
    }

    public function getListTest($category_id)
    {
        return view('Client.tests');
    }
}
