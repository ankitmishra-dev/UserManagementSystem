<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class IndexUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // can fetch all the users
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
