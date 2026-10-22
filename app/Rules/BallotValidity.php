<?php

namespace App\Rules;

use App\Question;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class BallotValidity implements ValidationRule
{
    /**
     * Create a new rule instance.
     *
     * @param  int  $editionId
     */
    public function __construct(protected $editionId)
    {
    }

    /**
     * Checks that the ballot submitted by the user does not contain
     * any illegal values, such responses to non-existing questions
     * or selecting more options than allowed by the rules
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $error = $this->check($value);

        if ($error !== null) {
            $fail($error);
        }
    }

    /**
     * Returns the error message for an invalid ballot, or null if it is valid.
     */
    protected function check(mixed $ballotQuestions): ?string
    {
        $invalid = __('validation.custom.ballot.ballot_validity');

        /* The value given must be an array */
        if (! is_array($ballotQuestions)) {
            return $invalid;
        }

        /* Fetch the edition's questions to ensure */
        $validQuestions = Question::where('edition_id', $this->editionId)->with('options')->get();

        foreach ($ballotQuestions as $ballotQuestion) {
            /* The question must contain an ID and options key */
            if (! isset($ballotQuestion['id']) || ! isset($ballotQuestion['options'])) {
                return $invalid;
            }

            /* Find the user's input question on the edition questions */
            $question = $validQuestions->filter(function ($validQuestion) use ($ballotQuestion) {
                return $validQuestion->id === $ballotQuestion['id'];
            })->first();

            /* If a question is not found, the ballot is invalid */
            if (empty($question)) {
                return $invalid;
            }

            /* If a question has more or fewer answers than allowed,
               inform the user via a more specific error message */
            if (count($ballotQuestion['options']) > $question->max_options) {
                return __('validation.custom.ballot.ballot_max');
            }

            if (count($ballotQuestion['options']) < $question->min_options) {
                return trans_choice('validation.custom.ballot.ballot_min', $question->min_options, ['min_options' => $question->min_options, 'question' => $question->question]);
            }

            foreach ($ballotQuestion['options'] as $ballotOption) {
                /* Find the selected options among the question's valid answers */
                $option = $question->options->filter(function ($validOption) use ($ballotOption) {
                    return $validOption->id === $ballotOption['id'];
                })->first();

                /* If a selected option is not found, the ballot is invalid */
                if (empty($option)) {
                    return $invalid;
                }
            }
        }

        return null;
    }
}
