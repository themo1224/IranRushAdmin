<?php

namespace App\Providers;

use App\Repositories\TutorialRepository;
use App\Repositories\TutorialRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TutorialRepositoryInterface::class, TutorialRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
