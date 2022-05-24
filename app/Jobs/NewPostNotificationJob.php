<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\NewPostNotification;
use Illuminate\Support\Facades\DB;
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


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($websiteId,$postId)
    {
        $this->websiteId = $websiteId;
        $this->postId = $postId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $websiteSubscribers = DB::table('websites')
        ->join('subscriptions', 'subscriptions.website_id','=','websites.id')
        ->join('users', 'users.id', '=','subscriptions.user_id')
        ->where('websites.id',$this->websiteId)
        ->select('users.*')->get()->pluck('id');

        Artisan::call('send:email', [
            'users' => $websiteSubscribers,
            'website' => $this->websiteId,
            'post' => $this->postId
        ]);

    }
}
