<?php

namespace App\Rules;

use App\Voter;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNotUsed implements ValidationRule
{
    /**
     * Create a new rule instance.
     *
     * @param  int  $editionId
     * @param  string  $phone  The properly formatted phone
     */
    public function __construct(protected $editionId, protected $phone)
    {
    }

    /**
     * Checks if the phone provided has already been associated
     * with a vote on the current edition
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $used = Voter::where('SMS_phone', $this->phone)
                     ->where('SMS_verified', 1)
                     ->where('edition_id', $this->editionId)->count();

        if ($used) {
            $fail(__('validation.custom.phone.phone_not_used'));
        }
    }
}
