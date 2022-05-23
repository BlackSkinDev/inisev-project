<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use Illuminate\Console\Command;
use App\Mail\NewPostNotification;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email  {website} {post} {users*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to website subscribers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        //php artisan send:email 1 17 1,2,3 -call command on CLI

        try{
            $userIds = $this->getUserIds($this->argument('users'));
            $subscribers =  User::whereIn('id',$userIds)->get();
            $website = Website::where('id', $this->argument('website'))->firstOrFail();
            $post = Post::where('id', $this->argument('post'))->firstOrFail();
            if($subscribers && $website && $post){
                foreach ($subscribers as $key => $user) {
                    Mail::to($user->email)->send(new NewPostNotification($website,$post));
                }
            }
        }
        catch(\Exception $e){
            $this->error($e->getMessage());
        }

    }

    public function getUserIds($ids){
        if(count($ids)>1){
            return $ids;
        }
        return explode(',',$ids[0]);
    }
}
