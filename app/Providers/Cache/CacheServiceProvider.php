<?php

namespace App\Providers\Cache;

use App\Contracts\CacheInterface;
use App\Utilities\CacheManager;
use Illuminate\Support\ServiceProvider;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CacheInterface::class, CacheManager::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void {}
}
