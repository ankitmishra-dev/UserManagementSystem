<?php

namespace App\Services\User;

use App\BusinessLogic\User\UserBO;

class UserService
{
    protected $userBO;

    public function __construct(UserBO $userBO)
    {
        $this->userBO = $userBO;
    }

    public function createUser(array $data)
    {
        return $this->userBO->createUser($data);
    }
}
