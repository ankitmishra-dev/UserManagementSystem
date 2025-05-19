<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DestroyUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // can destroy an user
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
