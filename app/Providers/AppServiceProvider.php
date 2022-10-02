<?php

namespace App\Providers;

use App\Services\PostService\Repositories\PostDatabaseRepository;
use App\Services\PostService\Repositories\PostRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PostRepositoryInterface::class, PostDatabaseRepository::class);
    }
}
