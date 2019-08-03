<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\HomeAdminRepositoryInterface as HomeAdminRepository;

class HomeController extends Controller
{
    protected $homeAdminRepository;

    /**
     * HomeController constructor.
     */
    public function __construct(HomeAdminRepository $homeAdminRepository)
    {
        $this->homeAdminRepository = $homeAdminRepository;
    }

    public function index()
    {
        $datas['countUsers'] = $this->homeAdminRepository->getCountUsers();
        $datas['countTests'] = $this->homeAdminRepository->getCountTests();
        $datas['countTestHistories'] = $this->homeAdminRepository->getCountTestHistories();
        $datas['countComments'] = $this->homeAdminRepository->getCountComments();

        $datas['staticalTesteds'] = $this->homeAdminRepository->getStaticalTested();
        $datas['historyChart'] = $this->homeAdminRepository->getHistoryChart();

        return view('Admin.home', $datas);
    }
}
