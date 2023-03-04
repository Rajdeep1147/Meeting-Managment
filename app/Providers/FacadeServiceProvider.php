<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\CustomFacade\Invoice;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
     $this->app->bind('Invoice',function($app){
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
        $this->app->bind('dateclass',Function(){
            return new DateClass();
        });
    }
}
