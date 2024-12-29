<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    // This method is responsible for authenticating the user based on the validated input data.
    public function authenticate()
    {
        $validated = $this->validated(); // Retrieves the validated data from the request.

        // Attempts to log the user in with the provided credentials.
        if (!Auth::attempt($validated)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
    }
    /**
     * Determine if the user is authorized to make this request.
     * 
     * This method always returns true, allowing all users to use this request class.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * Specifies the validation rules for the input fields in the login request.
     * 
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required', // The email field is mandatory.
                'string',   // The email must be a string.
                'email'     // The email must be in a valid email format.
            ],
            'password' => [
                'required', // The password field is mandatory.
                'string',   // The password must be a string.
            ]
        ];
    }
}
