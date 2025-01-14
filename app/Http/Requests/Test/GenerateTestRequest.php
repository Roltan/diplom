<?php

namespace App\Http\Requests\Test;

use Illuminate\Foundation\Http\FormRequest;

class GenerateTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'overCount' => ['required', 'numeric', 'min:1'],
            'topic' => ['required', 'string', 'filled', 'min:1'],
            'title' => ['nullable', 'string', 'filled', 'min:1'],
            'fillCount' => ['nullable', 'numeric', 'min:0'],
            'choiceCount' => ['nullable', 'numeric', 'min:0'],
            'blankCount' => ['nullable', 'numeric', 'min:0'],
            'relationCount' => ['nullable', 'numeric', 'min:0'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator) {
            $fill = request()->input('fillCount', 0);
            $choice = request()->input('choiceCount', 0);
            $blank = request()->input('blankCount', 0);
            $relation = request()->input('relationCount', 0);
            $over = request()->input('overCount');

            if (($fill + $choice + $blank + $relation) != $over and ($fill + $choice + $blank + $relation) != 0)
                $validator->errors()->add('general', 'the amount of fillCount, choiceCount, blankCount, relationCount must be equal to overCount');
        });
    }

    public function messages(): array
    {
        return [
            'overCount.required' => 'Поле "overCount" обязательно для заполнения.',
            'overCount.numeric' => 'Поле "overCount" должно быть числом.',
            'overCount.min' => 'Поле "overCount" должно быть не менее 1.',

            'topic.required' => 'Поле темы обязательно для заполнения.',
            'topic.string' => 'Поле темы должно быть строкой.',
            'topic.filled' => 'Поле темы не должно быть пустым.',
            'topic.min' => 'Поле темы должно содержать хотя бы один символ.',

            'title.string' => 'Поле заголовка должно быть строкой.',
            'title.filled' => 'Поле заголовка не должно быть пустым.',
            'title.min' => 'Поле заголовка должно содержать хотя бы один символ.',

            'fillCount.numeric' => 'Поле "fillCount" должно быть числом.',
            'fillCount.min' => 'Поле "fillCount" должно быть не менее 0.',

            'choiceCount.numeric' => 'Поле "choiceCount" должно быть числом.',
            'choiceCount.min' => 'Поле "choiceCount" должно быть не менее 0.',

            'blankCount.numeric' => 'Поле "blankCount" должно быть числом.',
            'blankCount.min' => 'Поле "blankCount" должно быть не менее 0.',

            'relationCount.numeric' => 'Поле "relationCount" должно быть числом.',
            'relationCount.min' => 'Поле "relationCount" должно быть не менее 0.',

            'general' => 'Сумма значений fillCount, choiceCount, blankCount, relationCount должна быть равна overCount.',
        ];
    }
}
