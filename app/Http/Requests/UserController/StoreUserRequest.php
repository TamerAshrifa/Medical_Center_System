<?php

namespace App\Http\Requests\UserController;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'between:2,50'], // Example: Tamer
            'last_name' => ['required', 'string', 'between:2,50'],
            'email' => ['required', 'string', 'email', 'max:75', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'boolean'],
            'username' => ['required', 'string', 'max:20', 'unique:users,username'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
