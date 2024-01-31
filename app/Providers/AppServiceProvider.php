<?php

namespace App\Providers;

use App\Services\BrandService;
use App\Services\BrandServiceImpl;
use App\Services\CategoryService;
use App\Services\CategoryServiceImpl;
use App\Services\UserService;
use App\Services\UserServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserService::class, UserServiceImpl::class);
        $this->app->bind(BrandService::class, BrandServiceImpl::class);
        $this->app->bind(CategoryService::class, CategoryServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
