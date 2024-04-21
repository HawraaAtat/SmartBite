<?php

namespace App\Rules;

use App\Enums\AllergensEnum;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AllergensRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_array($value)) {
            $fail('The :attribute must be an array.');
            return;
        }

        foreach ($value as $item) {
            if (!in_array($item, AllergensEnum::getValues())) {
                $fail('The selected :attribute is invalid.');
                return;
            }
        }
    }}
