<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ShowUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // can show an user
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
