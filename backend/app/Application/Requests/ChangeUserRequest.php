<?php

namespace App\Application\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'role' => ['required', 'string', 'exists:roles,name'],
        ];
    }
}
