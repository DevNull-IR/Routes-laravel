<?php

namespace AliBayat\LaravelLikeable;

use App\Console\Commands\route;
use Illuminate\Support\ServiceProvider;

/**
 * Laravel Likeable Package by Ali Bayat.
 */
class RoutesLaravelServiceProvider extends ServiceProvider
{
	public function boot()
	{
        if ($this->app->runningInConsole()) {
            $this->commands([
                route::class
            ]);
        }
		$this->loadMigrationsFrom(__DIR__.'/../migrations');
		$this->publishes([
			realpath(__DIR__.'/../migrations') => database_path('migrations')
		], 'migrations');
	}
	
	public function register() {}
}
