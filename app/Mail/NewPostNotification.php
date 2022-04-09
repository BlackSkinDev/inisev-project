<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPostNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $website;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($website,$post)
    {
        $this->website = $website;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.website.new_post_notification',['title'=>$this->post->title,'description'=>$this->post->description,'website'=>$this->website->name]);
    }
}
