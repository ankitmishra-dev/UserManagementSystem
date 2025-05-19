<?php

namespace App\Utilities;

use App\Contracts\CacheInterface;
use Closure;
use Illuminate\Support\Facades\Cache;

class CacheManager implements CacheInterface
{
    public function get(string $key, Closure $callback, int $ttl = 3600)
    {
        // Retrieve and Store
        return Cache::remember($key, $ttl, $callback);
    }

    public function put(string $key, $value, int $ttl = 3600)
    {
        Cache::put($key, $value, $ttl);
    }

    public function forget(string $key)
    {
        Cache::forget($key);
    }

    public function flush()
    {
        Cache::flush();
    }
}
