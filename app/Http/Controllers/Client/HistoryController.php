<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function getHistories(Request $request)
    {
        return view('Client.histories');
    }
}
