<?php

namespace App\Providers;

use App\Services\OrderService;
use Illuminate\Support\ServiceProvider;
use App\Classes\Contracts\OrderService as OrderServiceContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OrderServiceContract::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
