<?php

namespace App\Providers;

use App\Repositories\Article\ArticleRepository;
use App\Repositories\Article\ArticleRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Admin\AdminRepositoryInterface::class,
            \App\Repositories\Admin\AdminRepository::class,
        );
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
    }

    public function boot()
    {
    }
}
