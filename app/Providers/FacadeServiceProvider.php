<?php

namespace App\Providers;

use App\CustomFacade\Invoice;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Invoice', function ($app) {
            return new Invoice();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('dateclass', function () {
            return new DateClass();
        });
    }
}
