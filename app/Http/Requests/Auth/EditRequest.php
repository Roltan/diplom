<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'numeric', 'min:1'],
            'name' => ['required', 'string', 'filled', 'min:1'],
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле имени обязательно для заполнения.',
            'name.string' => 'Поле имени должно быть строкой.',
            'name.filled' => 'Поле имени не должно быть пустым.',
            'name.min' => 'Поле имени должно содержать хотя бы один символ.',

            'email.required' => 'Поле электронной почты обязательно для заполнения.',
            'email.email' => 'Поле электронной почты должно быть действительным адресом.',
        ];
    }
}
