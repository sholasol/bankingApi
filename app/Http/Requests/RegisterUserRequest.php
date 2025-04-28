<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'min:2', 'max:200'],
            'lastname' => ['required', 'string', 'min:2', 'max:200'],
            'email' => ['required', 'email', 'max:200', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'max:200'],
            'phone' => ['required', 'string', 'min:2', 'max:12', 'unique:users'],
            'pin' => ['nullable', 'string', 'min:2', 'max:12'],
            'address' => ['nullable', 'string', 'max:200'],
            'city' => ['nullable', 'string',  'max:200'],
            'dob' => ['nullable', 'string', 'min:2', 'max:200'],
            'avatar' => ['nullable', 'file', 'image'],
        ];
    }
}
