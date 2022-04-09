<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Jobs\NewPostNotificationJob;
use App\Traits\ResponseStructure;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;

class PostController extends Controller
{
    use ResponseStructure;


    public function store(PostRequest $request,Website $website){
        $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'website_id'=>$website->id
        ]);

        $subscribersCount =   $website->subscribers()->count();
        
        // send emails to users subscribed to website using job if website has any subscriber
        if($subscribersCount){
            NewPostNotificationJob::dispatch($website,$post);
        }

        return $this->successResponse($post,null,Response::HTTP_OK);
    }





}
