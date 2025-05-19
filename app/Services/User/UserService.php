<?php

namespace App\Services\User;

use App\BusinessLogic\User\UserBO;
use App\Models\User;

class UserService
{
    public function __construct(protected UserBO $userBO) {}

    public function getAllUsers(int $perPage = 10)
    {
        return $this->userBO->getAllUsers($perPage);
    }

    public function createUser(array $data)
    {
        return $this->userBO->createUser($data);
    }

    public function showUser(User $user)
    {
        return $this->userBO->showUser($user);
    }

    public function updateUser(User $user, array $data): User
    {
        return $this->userBO->updateUser($user, $data);
    }

    public function deleteUser(User $user): bool
    {
        return $this->userBO->deleteUser($user);
    }
}
