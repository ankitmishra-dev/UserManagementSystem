<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DestroyUserRequest;
use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\ShowUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Services\User\UserService;

class UserController extends Controller
{
    // constructor property promotion
    public function __construct(private UserService $userService) {}

    public function index(IndexUserRequest $request)
    {
        $perPage = $request->input('per_page', 10);

        $users = $this->userService->getAllUsers($perPage);

        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request)
    {
        $user = $this->userService->createUser($request->validated());

        return new UserResource($user);
    }

    public function show(ShowUserRequest $request, User $user)
    {
        $user = $this->userService->showUser($user);

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $dataToUpdate = $request->validated();

        if ($this->userService->updateUser($user, $dataToUpdate)) {

            $user->refresh();

            return new UserResource($user);

        } else {
            return response()->json(['message' => 'User not updated'], 422);
        }

    }

    public function destroy(DestroyUserRequest $request, User $user)
    {
        if ($this->userService->deleteUser($user)) {

            return response()->noContent();

        } else {
            return response()->json(['message' => 'User not deleted'], 422);
        }
    }
}
