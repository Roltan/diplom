<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    // Пользовательские сообщения об ошибках
    public function messages(): array
    {
        return [
            'email.required' => 'Поле электронной почты обязательно для заполнения.',
            'email.email' => 'Поле электронной почты должно быть действительным адресом.',
            'password.required' => 'Поле пароля обязательно для заполнения.',
            'password.string' => 'Поле пароля должно быть строкой.',
        ];
    }
}
