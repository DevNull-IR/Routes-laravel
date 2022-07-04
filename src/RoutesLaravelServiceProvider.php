<?php
namespace DevnullIr\RoutesLaravel;
use Illuminate\Support\ServiceProvider;

class RoutesLaravelServiceProvider extends ServiceProvider{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . "/../migrations");
        $this->publishes([
            realpath(__DIR__.'/../migrations') => database_path('migrations')
        ], 'migrations');
        
    }

    public function register()
    {
        
    }
}