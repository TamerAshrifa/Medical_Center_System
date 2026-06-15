<?php

namespace App\Http\Requests\AuthController;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'between:2,50'], // Example: Tamer
            'last_name' => ['required', 'string', 'between:2,50'],
            'email' => ['required', 'string', 'email', 'max:75', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'gender' => ['required', 'boolean'],
            'username' => ['required', 'string', 'max:20', 'unique:users,username'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
