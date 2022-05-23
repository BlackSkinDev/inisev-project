<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\User;
use App\Models\Website;
use App\Models\Subscription;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ResponseStructure;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Jobs\NewPostNotificationJob;
use App\Http\Requests\Posts\PostRequest;
use Illuminate\Support\Facades\Artisan;

class WebsiteController extends Controller
{

    use ResponseStructure;

    public function store(PostRequest $request,Website $website){

        $post  =  $website->posts()->create($request->validated());
        $websiteSubscribers = DB::table('websites')
        ->join('subscriptions', 'subscriptions.website_id','=','websites.id')
        ->join('users', 'users.id', '=','subscriptions.user_id')
        ->where('websites.id',$website->id)
        ->select('users.*')->get();


       if($websiteSubscribers){
            NewPostNotificationJob::dispatch($website->id,$post->id,$websiteSubscribers);
       }

       return $this->successResponse($post,null,Response::HTTP_OK);
    }



    // subscribe to website
    // Invalid users/websites returns 404
    public function subscribe(Website $website, User $user){
        // returns prompt if user is  subscribed to website
        if($user->hasSubscribedToWebsite($website->id)){
            return $this->successResponse(null,'You already subscribed to this website',Response::HTTP_OK);
        }
        // subscribe to website
        Subscription::create([
            'user_id'=>$user->id,
            'website_id' => $website->id
        ]);
        return $this->successResponse(null,'Subscription to website successful',Response::HTTP_OK);
    }







}
