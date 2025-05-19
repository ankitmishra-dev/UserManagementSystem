<?php

namespace App\BusinessLogic\User;

use App\DataAccess\User\UserRepository;
use App\Models\User;

class UserBO
{
    public function __construct(protected UserRepository $userRepository) {}

    public function getAllUsers($perPage)
    {
        // If we want to apply any special rules before showing users, we do it here
        // For now, just get users from the repository
        return $this->userRepository->all($perPage);
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function showUser(User $user)
    {
        return $this->userRepository->show($user);
    }

    public function updateUser(User $user, array $data): User
    {
        return $this->userRepository->update($user, $data);
    }

    public function deleteUser(User $user): bool
    {
        return $this->userRepository->delete($user);
    }
}
