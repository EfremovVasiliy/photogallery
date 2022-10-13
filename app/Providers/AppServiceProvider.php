<?php

namespace App\Providers;

use App\Services\CommentService\Repositories\CommentDatabaseRepository;
use App\Services\CommentService\Repositories\CommentRepositoryInterface;
use App\Services\LikeService\Repositories\LikeDatabaseRepository;
use App\Services\LikeService\Repositories\LikeRepositoryInterface;
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
        $this->app->bind(CommentRepositoryInterface::class, CommentDatabaseRepository::class);
        $this->app->bind(LikeRepositoryInterface::class, LikeDatabaseRepository::class);
    }
}
