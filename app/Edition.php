<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Edition extends Model
{
    use Translatable;

    /**
     * The attributes that can be translated
     *
     * @var array
     */
    public $translatedAttributes = [
        'name', 'description', 'docs', 'voting_places', 'proposal_form', 'about', 'sidebar', 'winner'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * Get the questions associated with the edition
     */
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    /**
     * Get all of the options for a question in an edition
     */
    public function options()
    {
        return $this->hasManyThrough('App\Option', 'App\Question');
    }

    /**
     * Get all the ballots for the edition
     */
    public function ballots()
    {
        return $this->hasMany('App\Ballot');
    }

    /**
     * Get all the voters for the edition
     */
    public function voters()
    {
        return $this->hasMany('App\Voter');
    }

    /**
     * Get all the cached results for an edition
     */
    public function results()
    {
        return $this->hasMany('App\Result');
    }

    /**
     * Get the reports belonging to the edition.
     */
    public function reports()
    {
        return $this->hasMany('App\Report');
    }

    /**
     * Get the logged IPs beloging to the edition.
     */
    public function limits()
    {
        return $this->hasMany('App\Limit');
    }

    /**
     * Get the current edition, along with the ballot
     *
     * @return object
     */
    public static function current($withBallot = false, $random = true, $published = 1)
    {
        $edition = Self::where('published', '=', $published);

        if($withBallot) {
            $edition->with(['questions' => function($questionsQuery) {
                $questionsQuery->with(['options' => function($optionsQuery) {
                    // $optionsQuery->orderByRaw('rand()'); // Fix this later
                }])->orderBy('id', 'asc');
            }]);
        }

        return $edition->orderBy('id', 'desc')->first();
    }

    /**
     * Get the past editions
     *
     * @return object
     */
    public static function pastEditions()
    {
        $editions = Self::where('published', 1)->orderBy('id', 'desc')->get();

        $editions->shift();

        return $editions->all();
    }

    /**
     * Get the results with option names
     *
     * @return object
     */
    public function fullResults()
    {
        $results = $this->questions()->with(['options' => function($optionsQuery) {
            $optionsQuery->with('result');
        }])->get();

        return $this->processResults($results);
    }

    /**
     * Get the turnout for the edition
     *
     * @return object
     */
    public function turnout()
    {
        return $this->voters()->where('ballot_cast', 1);
    }

    /**
     * Count votes cast
     */
    public function votes_cast()
    {
        $votes_cast = 0;
        $ballots = $this->ballots()->get();

        foreach($ballots as $ballot) {
            $decodedBallot = $ballot->decrypt();

            foreach($decodedBallot as $question => $options) {
                foreach($options as $option => $points) {
                        $votes_cast += 1;
                }
            }
        }

        return $votes_cast;
    }

    /**
     * Determine the phase of the vote
     *
     * @return boolean
     */
    public function phase()
    {
        if ($this->inProposalPhase()) {
            return 'proposals';
        }

        if ($this->isOpen()) {
            return 'vote';
        }

        if ($this->isAwaitingResults()) {
            return 'awaiting-results';
        }

        if ($this->resultsPublished()) {
            return 'results';
        }

        return 'prevote';
    }

    /**
     * Determine if current edition is open for voting or not
     *
     * @return boolean
     */
    public function isOpen()
    {

        $startTime = strtotime($this->start_date);
        $endTime = strtotime($this->end_date);
        $now = time();

        return ($startTime < $now && $endTime > $now);
    }

    /**
     * Determine if current edition's voting had ended but results
     * have not been made public yet.
     *
     * @return boolean
     */
    public function isAwaitingResults()
    {
        $endTime = strtotime($this->end_date);
        $now = time();

        return ($endTime < $now && !$this->resultsPublished());
    }

    /**
     * Determine if results should be made public
     *
     * @return boolean
     */
    public function resultsPublished()
    {

        $publishTime = strtotime($this->publish_results);
        $endTime = strtotime($this->end_date);
        $now = time();
        $finalTallyFinished = cache('final_tally_finished_' . $this->id);

        return ($publishTime < $now && $endTime < $now && $finalTallyFinished);
    }

    /**
     * Determine if current edition has not opened yet for voting
     *
     * @return boolean
     */
    public function isPending()
    {
        return (!$this->isOpen() && !$this->isAwaitingResults() && !$this->resultsPublished());
    }

    /**
     * Determine if proposals for the current edition are being accepted
     *
     * @return boolean
     */
    public function inProposalPhase()
    {
        if(!$this->proposal_form) return false;
        $proposalDeadline = strtotime($this->proposal_deadline);
        $now = time();

        return (!empty($this->proposal_form) && $now < $proposalDeadline);
    }

    /**
     * Process the results to add totals, percentages etc.
     *
     * @return array
     */
    private function processResults($results)
    {
        $tab = [];

        foreach($results as $question) {
            $options = $question->options->sortByDesc('result.points');
            $optionsWithResults = [];
            $questionResults = $question->results()->get();
            $total = $questionResults->sum('points');
            $max = $questionResults->max('points');

            foreach($options->values()->all() as $option) {
                $points = ($option->result) ? $option->result->points : 0;
                $percentage = ($total > 0) ? ($points * 100) / $total : 0;
                $relative = ($max > 0) ? ($points * 100) / $max : 0;
                $optionsWithResults[] = [
                    'id' => $option->id,
                    'option' => $option->option,
                    'pictures' => $option->pictures,
                    'status' => $option->status,
                    'description' => $option->description,
                    'color' => $option->color,
                    'funding' => $option->funding,
                    'cost' => $option->cost,
                    'points' => $points,
                    'percentage' => $percentage,
                    'relative' => $relative
                ];
            }

            $tab[$question->id] = [
                'question' => $question->question,
                'results_to_highlight' => $question->results_to_highlight,
                'type' => $question->type,
                'options' => $optionsWithResults
            ];
        }

        return $tab;
    }

    /**
     * Load templates and options for the About page
     *
     * @return array
     */
    public function buildAboutPage()
    {
        $edition = $this;
        $options = view('components.options', compact('edition'));

        $templateView = 'editions.' . $this->id . '_' . config('app.locale', 'ca');
        $templateViewFallback = 'editions.' . $this->id . '_' . config('app.fallback_locale', 'ca');

        if(view()->exists($templateView)) {
            $template = view($templateView, compact('edition'));
        } elseif(view()->exists($templateViewFallback)) {
            $template = view($templateViewFallback, compact('edition'));
        } else {
            $template = '';
        }

        return ['options' => $options, 'template' => $template];
    }

    /**
     * Load templates for the Results page
     *
     * @return array
     */
    public function buildResultsPage()
    {
        $edition = $this;
        $templateView = 'editions.' . $this->id . '_results_' . config('app.locale', 'ca');
        $templateViewFallback = 'editions.' . $this->id . '_results_' . config('app.fallback_locale', 'ca');

        if(view()->exists($templateView)) {
            $template = view($templateView, compact('edition'));
        } elseif(view()->exists($templateViewFallback)) {
            $template = view($templateViewFallback, compact('edition'));
        } else {
            $template = '';
        }

        return $template;
    }
}
