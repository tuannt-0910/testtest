<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RankingController extends Controller
{
    public function getRanking(Request $request)
    {
        return view('Client.ranking');
    }
}
