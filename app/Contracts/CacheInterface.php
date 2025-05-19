<?php

namespace App\Contracts;

use Closure;

interface CacheInterface
{
    public function get(string $key, Closure $callback, int $ttl);

    public function put(string $key, $value, int $ttl);

    public function forget(string $key);

    public function flush();
}
