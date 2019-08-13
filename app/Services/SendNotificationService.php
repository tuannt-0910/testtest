<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface as UserRepository;
use App\User;
use App\Notifications\UserTested;
use Notification;

class SendNotificationService
{
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    public function notifySubmitNewTest($testUser_id, $result)
    {
        $testUser = $this->userRepository->find($testUser_id);
        $viewUser = $this->userRepository->getUserHasPermission('notify-test-user');
        if ($viewUser) {
            Notification::send($viewUser, new UserTested($testUser, $result, $result->history));
        }
    }
}
