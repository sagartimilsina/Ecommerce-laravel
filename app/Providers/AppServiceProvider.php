<?php

namespace App\Providers;

use App\Models\Gallery;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        if (Schema::hasTable('galleries')) {
            $all_images = Gallery::query()->get();
            view()->share('all_images', $all_images);
        }
    }
}
