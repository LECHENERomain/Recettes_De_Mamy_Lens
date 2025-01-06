<?php

namespace App\Providers;

use App\Repositories\IRecetteRepository;
use App\Repositories\RecetteRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            IRecetteRepository::class,
            RecetteRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
