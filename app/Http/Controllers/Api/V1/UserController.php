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
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class UserController extends Controller
{
    // constructor property promotion
    public function __construct(private UserService $userService) {}

    public function index(IndexUserRequest $request): AnonymousResourceCollection
    {
        $perPage = $request->input('per_page', 10);

        $users = $this->userService->getAllUsers($perPage);

        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request): UserResource
    {
        $user = $this->userService->createUser($request->validated());

        return new UserResource($user);
    }

    public function show(ShowUserRequest $request, User $user): UserResource
    {
        $user = $this->userService->showUser($user);

        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user): UserResource
    {
        $dataToUpdate = $request->validated();

        $updatedUser = $this->userService->updateUser($user, $dataToUpdate);

        return new UserResource($updatedUser);

    }

    public function destroy(DestroyUserRequest $request, User $user): Response|JsonResponse
    {
        $this->userService->deleteUser($user);

        return response()->noContent();
    }
}
