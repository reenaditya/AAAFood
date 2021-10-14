<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Settings;

class EmailVerifyNotification extends Notification
{
    use Queueable;
    
    protected  $firstLine;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($firstLine)
    {
        $this->firstLine = $firstLine;
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
        $url = url('user/verify/email').'?token='.$notifiable->remember_token;
        return (new MailMessage)
                    ->line($this->firstLine)
                    ->action('Verify Email', $url)
                    ->line(Settings::get('email_message_footer_text'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
