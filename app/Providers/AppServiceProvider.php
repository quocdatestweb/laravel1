<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Repositories\PostCategoryRepository;
use App\Repositories\PostRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\PostCategoryRepositoryInterface;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
        {
            $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
            $this->app->bind(PostCategoryRepositoryInterface::class, PostCategoryRepository::class);
            $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
            $this->app->bind(ProductCategoryRepositoryInterface::class, ProductCategoryRepository::class);
            $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
