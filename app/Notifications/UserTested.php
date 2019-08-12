<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

class UserTested extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;
    protected $testResult;
    protected $history;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user, $testResult, $history)
    {
        $this->user = $user;
        $this->testResult = $testResult;
        $this->history = $history;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    public function toArray($notifiable)
    {
        $user = $this->user;
        $fullname = $user ? $user->firtname . ' ' . $user->lastname : config('guest_name');
        $link_history = route('client.history', ['history_id' => $this->history->id]);

        return [
            'user_name' => $fullname,
            'test_name' => $this->testResult->name,
            'link_history' => $link_history
        ];
    }
}
