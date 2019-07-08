<?php

namespace Email\SendEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;

class EmailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    
    public function register()
    {
         $this->app->make('Email\SendEmail\EmailController');
         // $this->loadViewsFrom(__DIR__.'/views', 'sendemail');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
 

    public function boot(\Illuminate\Routing\Router $router) {
        $this->loadViewsFrom(__DIR__.'/views', 'sendemail');
        include __DIR__.'/routes/web.php';
        $this->commands([
            \Email\SendEmail\Console\Commands\CronEmail ::class,
        ]);
    }
}
