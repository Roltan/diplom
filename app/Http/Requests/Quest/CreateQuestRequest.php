<?php

namespace App\Http\Requests\Quest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateQuestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'topic' => ['required', 'string', 'filled', 'min:1'],
            'quest' => ['required', 'string', 'filled', 'min:1'],
            'type' => ['required', 'string', Rule::in(['fill', 'blank', 'choice', 'relation'])],

            'correct' => [Rule::requiredIf(in_array($this->input('type'), ['blank', 'choice'])), 'array'],
            'correct.*' => [Rule::requiredIf(in_array($this->input('type'), ['blank', 'choice'])), 'string', 'filled', 'min:1'],

            'uncorrect' => [Rule::requiredIf($this->input('type') == 'choice'), 'array'],
            'uncorrect.*' => [Rule::requiredIf($this->input('type') == 'choice'), 'string', 'filled', 'min:1'],

            'first_column' => [Rule::requiredIf($this->input('type') == 'relation'), 'array'],
            'first_column.*' => [Rule::requiredIf($this->input('type') == 'relation'), 'string', 'filled', 'min:1'],

            'second_column' => [Rule::requiredIf($this->input('type') == 'relation'), 'array'],
            'second_column.*' => [Rule::requiredIf($this->input('type') == 'relation'), 'string', 'filled', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'topic.required' => 'Поле темы обязательно для заполнения.',
            'topic.string' => 'Поле темы должно быть строкой.',
            'topic.filled' => 'Поле темы не должно быть пустым.',
            'topic.min' => 'Поле темы должно содержать хотя бы один символ.',

            'quest.required' => 'Поле вопроса обязательно для заполнения.',
            'quest.string' => 'Поле вопроса должно быть строкой.',
            'quest.filled' => 'Поле вопроса не должно быть пустым.',
            'quest.min' => 'Поле вопроса должно содержать хотя бы один символ.',

            'type.required' => 'Поле типа обязательно для заполнения.',
            'type.string' => 'Поле типа должно быть строкой.',
            'type.in' => 'Поле типа должно быть одним из следующих значений: fill, blank, choice, relation.',

            'correct.required' => 'Поле правильных ответов обязательно для заполнения.',
            'correct.array' => 'Поле правильных ответов должно быть массивом.',
            'correct.*.required' => 'Каждый правильный ответ обязателен для заполнения.',
            'correct.*.string' => 'Каждый правильный ответ должен быть строкой.',
            'correct.*.filled' => 'Каждый правильный ответ не должен быть пустым.',
            'correct.*.min' => 'Каждый правильный ответ должен содержать хотя бы один символ.',

            'uncorrect.required' => 'Поле неправильных ответов обязательно для заполнения.',
            'uncorrect.array' => 'Поле неправильных ответов должно быть массивом.',
            'uncorrect.*.required' => 'Каждый неправильный ответ обязателен для заполнения.',
            'uncorrect.*.string' => 'Каждый неправильный ответ должен быть строкой.',
            'uncorrect.*.filled' => 'Каждый неправильный ответ не должен быть пустым.',
            'uncorrect.*.min' => 'Каждый неправильный ответ должен содержать хотя бы один символ.',

            'first_column.required' => 'Поле первой колонки обязательно для заполнения.',
            'first_column.array' => 'Поле первой колонки должно быть массивом.',
            'first_column.*.required' => 'Каждая запись в первой колонке обязательна для заполнения.',
            'first_column.*.string' => 'Каждая запись в первой колонке должна быть строкой.',
            'first_column.*.filled' => 'Каждая запись в первой колонке не должна быть пустой.',
            'first_column.*.min' => 'Каждая запись в первой колонке должна содержать хотя бы один символ.',

            'second_column.required' => 'Поле второй колонки обязательно для заполнения.',
            'second_column.array' => 'Поле второй колонки должно быть массивом.',
            'second_column.*.required' => 'Каждая запись во второй колонке обязательна для заполнения.',
            'second_column.*.string' => 'Каждая запись во второй колонке должна быть строкой.',
            'second_column.*.filled' => 'Каждая запись во второй колонке не должна быть пустой.',
            'second_column.*.min' => 'Каждая запись во второй колонке должна содержать хотя бы один символ.',
        ];
    }
}
