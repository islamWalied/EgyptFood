<?php

namespace App\Providers;

use App\Repositories\Implementation\CategoryRepositoryImpl;
use App\Repositories\Interface\CategoryRepository;
use App\Services\Implementation\CategoryServiceImpl;
use App\Services\Interface\CategoryService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryService::class, CategoryServiceImpl::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
