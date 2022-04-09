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
        $website->subscribers()->sync($user);
        return $this->successResponse(null,'Subscription to website successful',Response::HTTP_OK);
    }
}
