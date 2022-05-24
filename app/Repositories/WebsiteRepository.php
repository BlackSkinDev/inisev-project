<?php
namespace App\Repositories;

use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\IWebsiteRepository;

class WebsiteRepository implements IWebsiteRepository {

    public function storePost($request, $website)
    {
        $post = $website->posts()->create($request);
        return $post;
    }

    public function subscribeToWebsite($website, $user){
        Subscription::create([
            'user_id'=>$user->id,
            'website_id' => $website->id
        ]);
    }
}

?>
