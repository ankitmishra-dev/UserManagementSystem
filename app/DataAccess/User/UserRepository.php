<?php

namespace App\DataAccess\User;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserRepository
{
    public function find(int $id): ?User
    {
        return Cache::remember("user.$id", 3600, fn () => User::find($id));
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): bool
    {
        Cache::forget("user.{$user->id}");

        return $user->update($data);
    }
}
