<?php

namespace App\DataAccess\User;

use App\Contracts\CacheInterface;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserRepository
{
    private $cache;

    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    public function all($perPage)
    {
        return User::paginate($perPage);
    }

    public function create(array $data): User
    {
        $user = User::create($data);

        $key = 'cache_user_'.$user->id;

        return $this->cache->get($key, fn () => $user, 3600);
    }

    public function show(User $user): User
    {
        $key = 'cache_user_'.$user->id;

        return $this->cache->get($key, fn () => $user, 3600);
    }

    public function update(User $user, array $data): User
    {
        $user->update($data);

        $user->refresh();

        $key = 'cache_user_'.$user->id;

        $this->cache->forget($key); // Here we clear the cache before updating

        return $this->cache->get($key, fn () => $user, 3600);
    }

    public function delete(User $user): bool
    {
        $this->cache->forget('cache_user_'.$user->id);

        return $user->delete();
    }
}
