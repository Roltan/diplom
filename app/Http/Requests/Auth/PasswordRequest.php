<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'regex:/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d).*$/', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Поле электронной почты обязательно для заполнения.',
            'email.email' => 'Поле электронной почты должно быть действительным адресом.',

            'password.required' => 'Поле пароля обязательно для заполнения.',
            'password.string' => 'Поле пароля должно быть строкой.',
            'password.regex' => 'Поле пароля должно содержать минимум 8 символов, включая буквы и цифры.',
            'password.confirmed' => 'Подтверждение пароля не совпадает.',
        ];
    }
}
