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
use App\Services\WebsiteService;
use Illuminate\Support\Facades\Artisan;
use LDAP\Result;

class WebsiteController extends Controller
{


    use ResponseStructure;

    protected $websiteService;

    public  function __construct(WebsiteService $websiteService)
    {
        $this->websiteService = $websiteService;
    }


    public function store(PostRequest $request,Website $website)
    {
        try{
            $post = $this->websiteService->storeWebsitePost($request->validated(),$website);
            return $this->successResponse($post,null,Response::HTTP_OK);
        }
        catch(\Exception $e){
            $this->errorResponse($e->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR,null);
        }
    }



    // subscribe to website
    // Invalid users/websites returns 404
    public function subscribe(Website $website, User $user)
    {
        try{
            // returns prompt if user is  subscribed to website
            if($user->hasSubscribedToWebsite($website->id)){
                return $this->successResponse(null,'You already subscribed to this website!',Response::HTTP_OK);
            }
            $this->websiteService->subscribeToWebsite($website,$user);
            return $this->successResponse(null,'Subscription successful!',Response::HTTP_OK);
        }
        catch(\Exception $e){
            $this->errorResponse($e->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR,null);
        }
    }

}







