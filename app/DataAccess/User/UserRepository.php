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

    public function all($perPage)
    {
        return User::paginate($perPage);
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function show(User $user): User
    {
        return $user;
    }

    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
