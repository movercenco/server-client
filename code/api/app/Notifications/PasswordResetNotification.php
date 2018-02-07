<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordResetNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $token;
    public $url = "";

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $this->url = env('APP_ENV') == 'production'
            ? 'https://mundolingo.org?resetpwd=true&token='
            : 'https://c0c9f349300664f6.web.mundolingo.org?resetpwd=true&token=';

        return (new MailMessage)
            ->greeting("Dear user,")
            ->line('Please click following button to reset your password')
            ->action('Reset My Password', url($this->url . $this->token))
            ->line('If you have not requested a password reset, you can safely ignore this email. You password will be untouched!');
    }
}
