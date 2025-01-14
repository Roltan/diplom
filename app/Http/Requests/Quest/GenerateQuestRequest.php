<?php

namespace App\Http\Requests\Quest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GenerateQuestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => ['nullable', 'string', Rule::in(['fill', 'blank', 'choice', 'relation'])],
            'topic' => ['required', 'string', 'filled', 'min:1'],
            'ids' => ['nullable', 'array'],
            'ids.*' => ['numeric']
        ];
    }

    public function messages(): array
    {
        return [
            'type.string' => 'Поле типа должно быть строкой.',
            'type.in' => 'Поле типа должно быть одним из следующих значений: fill, blank, choice, relation.',

            'topic.required' => 'Поле темы обязательно для заполнения.',
            'topic.string' => 'Поле темы должно быть строкой.',
            'topic.filled' => 'Поле темы не должно быть пустым.',
            'topic.min' => 'Поле темы должно содержать хотя бы один символ.',

            'ids.array' => 'Поле идентификаторов должно быть массивом.',
            'ids.*.numeric' => 'Каждый идентификатор должен быть числом.',
        ];
    }
}
