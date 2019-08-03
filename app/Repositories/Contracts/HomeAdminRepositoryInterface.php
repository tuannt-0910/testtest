<?php

namespace App\Repositories\Contracts;

interface HomeAdminRepositoryInterface
{
    public function getCountUsers();

    public function getCountTests();

    public function getCountTestHistories();

    public function getCountComments();

    public function getStaticalTested();

    public function getHistoryChart();
}
