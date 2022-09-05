<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class NewPostCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $posts;
    /**
     * Create a new notification instance.
     *
     * @param Post $post
     * @return void
     */
    public function __construct( $posts)
    {
        //
        $this->posts = $posts;
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
        
        return (new MailMessage())
            ->subject('We have a new post for you!')
            ->line(new HtmlString("<b>{$this->posts->title}</b>"))
            ->line($this->posts->description)
            ->line('Thank you for using our application!');
    }


}
