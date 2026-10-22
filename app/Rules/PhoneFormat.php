<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneFormat implements ValidationRule
{
    /**
     * Checks if user has entered their phone correctly
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_numeric($value)) {
            $fail(__('validation.custom.phone.phone_format'));

            return;
        }

        /* Alert a Spanish user if mobile phone is not exactly 9 numbers */
        /* Consider switching to more robust solution for international users */
        $dialCode = explode('.', $value);
        if ($dialCode == '34' && strlen($value) != 9) {
            $fail(__('validation.custom.phone.phone_format'));
        }
    }
}
