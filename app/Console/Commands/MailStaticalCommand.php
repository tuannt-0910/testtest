<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Contracts\HomeAdminRepositoryInterface as HomeAdminRepository;
use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\Notifications\SendMailStatically;
use Notification;

class MailStaticalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendMailDaily:statically';

    protected $homeAdminRepository;

    protected $userRepository;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail statically daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(HomeAdminRepository $homeAdminRepository, UserRepository $userRepository)
    {
        parent::__construct();
        $this->homeAdminRepository = $homeAdminRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $datas['countUsers'] = $this->homeAdminRepository->getCountUsers();
        $datas['countTests'] = $this->homeAdminRepository->getCountTests();
        $datas['countTestHistories'] = $this->homeAdminRepository->getCountTestHistories();
        $datas['countComments'] = $this->homeAdminRepository->getCountComments();

        $viewUser = $this->userRepository->getUserHasPermission('email-statical-daily');
        if ($viewUser) {
            Notification::send($viewUser, new SendMailStatically($datas));
        }
    }
}
