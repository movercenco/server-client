<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewEventCreated extends Notification implements ShouldQueue
{
    use Queueable;

    public $event;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
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

        $eventId = $this->event->id;
        $cityId = $this->event->city_id;

        $url = env('APP_ENV') == 'production'
            ? "https://mundolingo.org/event-details.html?eventId={$eventId}&cityId={$cityId}"
            : "https://c0c9f349300664f6.web.mundolingo.org/event-details.html?eventId={$eventId}&cityId={$cityId}";

        return (new MailMessage)
            ->greeting("Dear user,")
            ->line('A new weekly event has been added for your city. Check our website for more information.')
            ->action('Check Event', url($url));
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
