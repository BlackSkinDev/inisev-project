<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Traits\ResponseStructure;
use App\Http\Controllers\Controller;

class WebsiteController extends Controller
{

    use ResponseStructure;


    // subscribe to website
    // Invalid users/websites returns 404
    public function subscribe(Website $website, User $user){
        $currentSubscribers =   $website->subscribers()->get()->pluck('id')->toArray();
        if(in_array($user->id,$currentSubscribers)){
            return $this->successResponse(null,'You already subscribed to this website',Response::HTTP_OK);
        }
        $website->subscribers()->attach($user);
        return $this->successResponse(null,'Subscription to website successful',Response::HTTP_OK);
    }
}
