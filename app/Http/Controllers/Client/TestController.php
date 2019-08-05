<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function getTest($test_id)
    {
        return view('Client.test');
    }

    public function postTest(Request $request, $test_id)
    {
        return view('Client.test');
    }
}
