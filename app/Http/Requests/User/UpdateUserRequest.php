<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // can update an user
    }

    public function rules()
    {
        return [
            'name' => 'sometimes|string',
            'email' => ['sometimes', 'email', Rule::unique('users')->ignore($this->user)],
            'password' => ['required', Password::min(10)->numbers()->letters()->mixedCase()->symbols()],
        ];
    }
}
