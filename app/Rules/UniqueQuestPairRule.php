<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueQuestPairRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pairs = [];

        foreach ($value as $item) {
            $pair = $item['id'] . '-' . $item['type'];

            if (in_array($pair, $pairs)) {
                $fail('The :attribute must contain unique pairs of id and type.');
                return;
            }

            $pairs[] = $pair;
        }
    }
}
