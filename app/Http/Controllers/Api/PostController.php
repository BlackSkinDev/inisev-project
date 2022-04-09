<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ResponseStructure;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\PostRequest;

class PostController extends Controller
{
    use ResponseStructure;


    public function store(PostRequest $request,$website){
        $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'website_id'=>$website
        ]);
        return $this->successResponse($post,null,Response::HTTP_OK);
    }


}
