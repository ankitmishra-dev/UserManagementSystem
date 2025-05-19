<?php

namespace App\BusinessLogic\User;

use App\DataAccess\User\UserRepository;

class UserBO
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data)
    {
        // Add business logic (e.g., check email domain)
        return $this->userRepository->create($data);
    }
}
