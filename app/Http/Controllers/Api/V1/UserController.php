<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\DestroyUserRequest;
use App\Http\Requests\User\ShowUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    public function index(DestroyUserRequest $request)
    {
        //
    }

    public function store(StoreUserRequest $request)
    {
        dd($request->validated());
    }

    public function show(ShowUserRequest $request, string $id)
    {
        //
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        //
    }

    public function destroy(DestroyUserRequest $request, string $id)
    {
        //
    }
}
