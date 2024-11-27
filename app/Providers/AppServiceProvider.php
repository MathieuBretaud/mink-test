<?php

namespace App\Providers;

use App\Contracts\ImageResizerInterface;
use App\Models\Animal;
use App\Policies\AnimalPolicy;
use App\Services\GlideImageResizer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ImageResizerInterface::class, GlideImageResizer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Animal::class, AnimalPolicy::class);
    }
}
