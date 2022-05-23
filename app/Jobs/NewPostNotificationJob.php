<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\NewPostNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NewPostNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $postId;
    public $websiteId;
    public $users;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($websiteId,$postId,$users)
    {
        $this->websiteId = $websiteId;
        $this->postId = $postId;
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        Artisan::call('send:email', [
            'users' => $this->users->pluck('id'),
            'website' => $this->websiteId,
            'post' => $this->postId
        ]);

    }
}
