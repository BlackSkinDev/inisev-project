<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\NewPostNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NewPostNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;
    public $website;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($website,$post)
    {
        $this->website = $website;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $subscribers = $this->website->subscribers()->get();

        foreach ($subscribers as $key => $user) {
            Mail::to($user)->send(new NewPostNotification($this->website,$this->post));
        }

    }
}
