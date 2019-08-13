<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendMailStatically extends Notification implements ShouldQueue
{
    use Queueable;

    protected $datas;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The website statically:')
            ->line('countUsers is ' . $this->datas['countUsers'])
            ->line('countTests is ' . $this->datas['countTests'])
            ->line('countTestHistories is ' . $this->datas['countTestHistories'])
            ->line('countComments is ' . $this->datas['countComments'])
            ->line('~~' . date("Y/m/d - h:i:s") . '~~')
            ->line('Thank you for reading this letter!');
    }
}
