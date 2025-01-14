<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\DataAwareRule;

class AnswerTextRule implements ValidationRule, DataAwareRule
{
    protected $data = [];

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $index = explode('.', $attribute)[1];
        $type = $this->data['answer'][$index]['type'] ?? null;

        if (!$type) {
            $fail('The :attribute type is missing.');
            return;
        }

        switch ($type) {
            case 'blank':
                if (!is_string($value) and $value != '') {
                    $fail('The :attribute must be a string for type \'blank\'.');
                }
                break;
            case 'relation':
                if (!is_array($value) || !array_filter($value, 'is_string') === $value) {
                    $fail('The :attribute must be an array of strings for type \'relation\'.');
                }
                break;
            case 'choice':
                if (!is_array($value) && !is_string($value)) {
                    $fail('The :attribute must be an array of strings or a string for type \'choice\'.');
                }
                break;
            case 'fill':
                if (!is_array($value) || !array_filter($value, 'is_string') === $value) {
                    $fail('The :attribute must be an array of strings for type \'fill\'.');
                }
                break;
            default:
                $fail('The :attribute type is invalid.');
                break;
        }
    }
}
