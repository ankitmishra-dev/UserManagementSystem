<?php

namespace App\Providers\Cache;

use App\Contracts\CacheInterface;
use App\Utilities\DatabaseBasedCache;
use App\Utilities\FileBasedCache;
use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CacheInterface::class, function ($app) {

            /* IF this grows we may keep this in seprate class and fetch from there */
            return match (config('cache.default')) {
                'database' => new DatabaseBasedCache,
                'file' => new FileBasedCache,
                default => new DatabaseBasedCache
            };

        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
