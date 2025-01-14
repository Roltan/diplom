<?php

namespace App\Http\Requests;

use App\Rules\AnswerTextRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveSolvedRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'test_alias' => ['required', 'string', 'min:1', 'filled'],
            'time' => ['required', 'numeric', 'min:0'],
            'is_escape' => ['required', 'boolean'],

            'answer' => ['required', 'array'],
            'answer.*' => ['required', 'array'],
            'answer.*.id' => ['required', 'numeric', 'min:1'],
            'answer.*.type' => ['required', Rule::in(['fill', 'relation', 'choice', 'blank'])],
            'answer.*.text' => [new AnswerTextRule]
        ];
    }

    public function messages(): array
    {
        return [
            'test_alias.required' => 'Поле "test_alias" обязательно для заполнения.',
            'test_alias.string' => 'Поле "test_alias" должно быть строкой.',
            'test_alias.min' => 'Поле "test_alias" должно содержать хотя бы один символ.',
            'test_alias.filled' => 'Поле "test_alias" не должно быть пустым.',

            'time.required' => 'Поле "time" обязательно для заполнения.',
            'time.numeric' => 'Поле "time" должно быть числом.',
            'time.min' => 'Поле "time" должно быть не менее 0.',

            'is_escape.required' => 'Поле "is_escape" обязательно для заполнения.',
            'is_escape.boolean' => 'Поле "is_escape" должно быть логическим значением.',

            'answer.required' => 'Поле "answer" обязательно для заполнения.',
            'answer.array' => 'Поле "answer" должно быть массивом.',

            'answer.*.required' => 'Каждый элемент массива "answer" обязателен для заполнения.',
            'answer.*.array' => 'Каждый элемент массива "answer" должен быть массивом.',

            'answer.*.id.required' => 'Поле "id" в каждом элементе массива "answer" обязательно для заполнения.',
            'answer.*.id.numeric' => 'Поле "id" в каждом элементе массива "answer" должно быть числом.',
            'answer.*.id.min' => 'Поле "id" в каждом элементе массива "answer" должно быть не менее 1.',

            'answer.*.type.required' => 'Поле "type" в каждом элементе массива "answer" обязательно для заполнения.',
            'answer.*.type.in' => 'Поле "type" в каждом элементе массива "answer" должно быть одним из следующих значений: fill, relation, choice, blank.',

            'answer.*.text.AnswerTextRule' => 'В поле "answer" минимум один из вложенных "text" имеет неверный формат.',
        ];
    }
}
