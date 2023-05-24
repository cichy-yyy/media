<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\MediaRepositoryInterface;
use App\Repository\MediaRepository;
use App\Repository\JournalistRepositoryInterface;
use App\Repository\JournalistRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MediaRepositoryInterface::class, MediaRepository::class);
        $this->app->bind(JournalistRepositoryInterface::class, JournalistRepository::class);
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
