<?php

namespace App\Providers;

use App\Services\BrandService;
use App\Services\BrandServiceImpl;
use App\Services\CartService;
use App\Services\CartServiceImpl;
use App\Services\CategoryService;
use App\Services\CategoryServiceImpl;
use App\Services\ProductService;
use App\Services\ProductServiceImpl;
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
        $this->app->bind(ProductService::class, ProductServiceImpl::class);
        $this->app->bind(CartService::class, CartServiceImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
