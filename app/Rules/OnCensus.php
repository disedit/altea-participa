<?php

namespace App\Rules;

use App\Limit;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OnCensus implements ValidationRule
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
     * Checks if ID exists on the current edition census
     * If an ID does not exist, it logs the error to prevent
     * brute force attacks to guess valid IDs
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->voter) {
            Limit::logAction('IDFailedLookUp', null, $value);
            $fail(__('validation.custom.SID.on_census'));
        }
    }
}
