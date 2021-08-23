<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Support\ServiceProvider;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @param Factory $cache
     * @param Setting $settings
     * @return void
     */
    public function boot(Factory $cache, Setting $settings)
    {
        /*$settings = $cache->remember('settings', 60, function() use ($settings)
        {
            return $settings->first()->toArray();
        });*/

        $settings = $settings->first()->toArray();

        config()->set('settings', $settings);
    }
}
