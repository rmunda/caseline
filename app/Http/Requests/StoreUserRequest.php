<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // changed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             'name'     => 'required|regex:/^[a-zA-Z\s]+$/|max:100',
             'email'    => 'required|email|unique:users,email',
             'password' => 'required|string|min:8|confirmed',
             'role'     => 'required|string',
             'active'   => 'boolean',
        ];
    }

    // Optional
    public function messages(): array
    {
        return [
            'name.required'     => 'Please enter the Name.',
            'name.string'       => 'Name must contain only valid characters.',
            'name.max'          => 'Name cannot exceed 50 characters.',

            'name.required'     => 'Please enter a name.',
            'email.unique'      => 'That email is already taken.',
            'password.min'      => 'Password must be at least 8 characters.',
            'password.confirmed'=> 'Passwords do not match.',
        ];
    }
}
