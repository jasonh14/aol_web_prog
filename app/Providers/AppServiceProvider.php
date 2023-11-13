<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelFrontendPresets\BlackPreset\BlackPreset;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once base_path('BlackPreset.php');

        // Call the install method
        BlackPreset::install();
    }
}
