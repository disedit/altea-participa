<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class HasNotVoted implements ValidationRule
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
     * Checks if ID has already cast a ballot on the current edition
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->voter) {
            return;
        }

        if ($this->voter->ballot_cast !== 0) {
            $fail(__('validation.custom.SID.has_not_voted'));
        }
    }
}
