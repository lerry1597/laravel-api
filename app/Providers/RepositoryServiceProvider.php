<?php

namespace App\Providers;

use App\Interface\ProductRepositoryInterface;
use App\Interface\ProductViewRepositoryInterface;
use App\Interface\TypeRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Repositories\ProductViewRepository;
use App\Repositories\TypeRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductViewRepositoryInterface::class, ProductViewRepository::class);
        $this->app->bind(TypeRepositoryInterface::class, TypeRepository::class);
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
