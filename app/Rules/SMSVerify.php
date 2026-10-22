<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SMSVerify implements ValidationRule
{
    /**
     * Create a new rule instance.
     *
     * @param  \App\Voter|null  $voter
     */
    public function __construct(protected $voter)
    {
    }

    /**
     * Checks if the SMS code is the same as the code sent to the voter
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $voterToken = ($this->voter) ? $this->voter->SMS_token : null;

        if ($voterToken !== $value || empty($voterToken)) {
            $fail(__('validation.custom.SMS_code.sms_code'));
        }
    }
}
