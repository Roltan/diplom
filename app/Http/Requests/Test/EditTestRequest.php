<?php

namespace App\Http\Requests\Test;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'alias' => ['required', 'string'],
            'title' => ['nullable', 'string', 'max:255'],
            'only_user' => ['nullable', 'boolean']
        ];
    }

    protected function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            // Массив полей, которые должны проверяться
            $fieldsToCheck = [
                'title',
                'only_user',
            ];

            $data = $this->all();

            // Проверяем, что хотя бы одно из полей присутствует в запросе
            $atLeastOneFieldExists = false;
            foreach ($fieldsToCheck as $field) {
                if (isset($data[$field]) && !empty($data[$field])) {
                    $atLeastOneFieldExists = true;
                    break;
                }
            }

            // Если ни одно поле не заполнено, добавляем ошибку
            if (!$atLeastOneFieldExists)
                $validator->errors()->add('fields', 'Хотя бы одно из полей (' . implode(', ', $fieldsToCheck) . ') должно быть заполнено.');
        });
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле заголовка обязательно для заполнения.',
            'title.string' => 'Поле заголовка должно быть строкой.',
            'title.max' => 'Поле заголовка не должно превышать 255 символов.',

            'only_user.boolean' => 'Поле "только для пользователя" должно быть логическим значением.',
            'leave.boolean' => 'Поле "оставить" должно быть логическим значением.',
        ];
    }
}
