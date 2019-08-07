<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\TestRepositoryInterface as TestRepository;

class HomeController extends Controller
{
    protected $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }


    public function home()
    {
        $freeTests = $this->testRepository->getFreeTests();
        $newTests = $this->testRepository->getNewTests();

        return view('Client.home', ['freeTests' => $freeTests, 'newTests' => $newTests]);
    }
}
