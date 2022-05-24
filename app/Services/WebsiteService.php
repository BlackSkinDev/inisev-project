<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Jobs\NewPostNotificationJob;
use App\Repositories\Contracts\IWebsiteRepository;

class WebsiteService {

    protected $websiteRepository;

    public  function __construct(IWebsiteRepository $websiteRepository) {
        $this->websiteRepository = $websiteRepository;
    }


    public function storeWebsitePost($request,$website)
    {
        $post = $this->websiteRepository->storePost($request,$website);
        NewPostNotificationJob::dispatch($website->id,$post->id);
        return $post;
    }


    public function subscribeToWebsite($website,$user)
    {
        $this->websiteRepository->subscribeToWebsite($website,$user);
    }

}

?>
