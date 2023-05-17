<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AuthorNotification extends Notification
{
    use Queueable;

    protected $type;
    protected $author;
    protected $story;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($type, $author, $story)
    {
        $this->type = $type;
        $this->author = $author;
        $this->story = $story;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //
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
            'date' => date('d/m/Y H:i:s'),
            'type' => $this->type,
            'author' => $this->author,
            'story' => $this->story
        ];
    }
}
