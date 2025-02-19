<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'filled', 'min:1'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'regex:/^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d).*$/', 'confirmed'],
            'rule' => ['accepted']
        ];
    }

    // Пользовательские сообщения об ошибках
    public function messages(): array
    {
        return [
            'name.required' => 'Поле имени обязательно для заполнения.',
            'name.string' => 'Поле имени должно быть строкой.',
            'name.filled' => 'Поле имени не должно быть пустым.',
            'name.min' => 'Поле имени должно содержать хотя бы один символ.',

            'email.required' => 'Поле электронной почты обязательно для заполнения.',
            'email.email' => 'Поле электронной почты должно быть действительным адресом.',
            'email.unique' => 'Такая почта уже занята',

            'password.required' => 'Поле пароля обязательно для заполнения.',
            'password.string' => 'Поле пароля должно быть строкой.',
            'password.regex' => 'Поле пароля должно содержать минимум 8 символов, включая латинские буквы и цифры.',
            'password.confirmed' => 'Подтверждение пароля не совпадает.',

            'rule.accepted' => 'Без согласия на обработку персональных данных, мы не можем вас зарегистрировать.',
        ];
    }
}
