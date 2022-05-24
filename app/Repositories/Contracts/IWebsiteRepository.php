<?php
namespace App\Repositories\Contracts;

interface IWebsiteRepository {

    public function storePost($request,$website);
    public function subscribeToWebsite($website, $user);
}

?>
