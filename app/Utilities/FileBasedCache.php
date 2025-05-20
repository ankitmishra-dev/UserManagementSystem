<?php

namespace App\Utilities;

use App\Contracts\CacheInterface;
use Closure;
use Illuminate\Support\Facades\Cache;

class FileBasedCache implements CacheInterface
{
    public function get(string $key, Closure $callback, int $ttl = 3600)
    {
        // Retrieve and Store
        return Cache::store('file')->remember($key, $ttl, $callback);
    }

    public function put(string $key, $value, int $ttl = 3600)
    {
        Cache::store('file')->put($key, $value, $ttl);
    }

    public function forget(string $key)
    {
        Cache::store('file')->forget($key);
    }

    public function flush()
    {
        Cache::flush();
    }
}
