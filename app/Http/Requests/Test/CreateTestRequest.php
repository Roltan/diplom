<?php

namespace App\Http\Requests\Test;

use App\Rules\UniqueQuestPairRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CreateTestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'topic' => ['required', 'string', 'max:255'],
            'quest' => ['required', 'array', new UniqueQuestPairRule()],
            'quest.*.id' => ['required', 'integer', 'min:1'],
            'quest.*.type' => ['required', Rule::in(['fill', 'blank', 'choice', 'relation'])],
            'only_user' => ['nullable', 'boolean'],
            'leave' => ['nullable', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Поле заголовка обязательно для заполнения.',
            'title.string' => 'Поле заголовка должно быть строкой.',
            'title.max' => 'Поле заголовка не должно превышать 255 символов.',

            'topic.required' => 'Поле темы обязательно для заполнения.',
            'topic.string' => 'Поле темы должно быть строкой.',
            'topic.max' => 'Поле темы не должно превышать 255 символов.',

            'quest.required' => 'Поле вопросов обязательно для заполнения.',
            'quest.array' => 'Поле вопросов должно быть массивом.',
            'quest.UniqueQuestPairRule' => 'Поле вопросов должно содержать уникальные пары id и type.',

            'quest.*.id.required' => 'Поле идентификатора вопроса обязательно для заполнения.',
            'quest.*.id.integer' => 'Поле идентификатора вопроса должно быть целым числом.',
            'quest.*.id.min' => 'Поле идентификатора вопроса должно быть не менее 1.',

            'quest.*.type.required' => 'Поле типа вопроса обязательно для заполнения.',
            'quest.*.type.in' => 'Поле типа вопроса должно быть одним из следующих значений: fill, blank, choice, relation.',

            'only_user.boolean' => 'Поле "только для пользователя" должно быть логическим значением.',
            'leave.boolean' => 'Поле "оставить" должно быть логическим значением.',
        ];
    }
}
