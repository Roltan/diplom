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
            'only_user' => ['nullable', 'boolean'],
            'max_time' => ['nullable', 'string', 'regex:/^([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/']
        ];
    }

    protected function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            // Массив полей, которые должны проверяться
            $fieldsToCheck = [
                'title',
                'only_user',
                'max_time'
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

            // Преобразуем max_time из формата HH:MM в секунды
            if (isset($data['max_time']) && !empty($data['max_time'])) {
                $timeParts = explode(':', $data['max_time']);
                $hours = (int)$timeParts[0];
                $minutes = (int)$timeParts[1];
                $this->merge(['max_time' => ($hours * 3600) + ($minutes * 60)]); // Преобразуем в секунды
            }
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
