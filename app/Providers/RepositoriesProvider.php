<?php

namespace App\Providers;

use App\Repositories\Contracts\IWebsiteRepository;
use App\Repositories\WebsiteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IWebsiteRepository::class,WebsiteRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
