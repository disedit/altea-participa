<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edition;
use App\Option;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * The active edition.
     *
     * @var object
     */
    protected $edition;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->edition = Edition::current('ballot');
    }

    /**
     * Homepage
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->checkEditionExists();

        $edition = $this->edition;
        $pastEditions = Edition::pastEditions();
        $projects = Edition::with(['options' => function ($query) {
            return $query
                ->join('option_translations', 'options.id', '=', 'option_translations.option_id')
                ->join('results', 'options.id', '=', 'results.option_id')
                ->where('option_translations.locale', config('app.locale'))
                ->whereNotNull('status')
                ->orderBy('results.points', 'desc');
        }])->where('has_projects', 1)->orderBy('id', 'desc')->get()
            ->map(function ($edition) {
                return [
                    'id' => $edition->id,
                    'year' => date('Y', strtotime($edition->end_date)),
                    'projects' => $edition->options->map(function ($option) {
                        return [
                            'id' => $option->id,
                            'option' => $option->option,
                            'status' => $option->status,
                            'funding' => $option->funding,
                            'cost' => $option->cost,
                            'color' => $option->color,
                            'description' => $option->description,
                            'attachments' => $option->attachments,
                            'pictures' => $option->pictures,
                            'motivation' => $option->motivation,
                            'points' => $option->points
                        ];
                    })
                ];
            });

        return view('homepage', compact('edition', 'pastEditions', 'projects'));
    }

    /**
     * Determine what page to show on the participa frontpage.
     *
     * @return \Illuminate\View\View
     */
    public function participa(Request $request)
    {
        $now = time();
        $edition = $this->edition;
        $pastEditions = Edition::pastEditions();
        $forceOpen = $request->get('force_open');

        // If within voting window dates, show voting booth
        if ($edition->isOpen() || $forceOpen) {
            $user = $request->user();
            $inPerson = ($user) ? true : false;
            $loadingTemplate = (count($edition->questions))
                ? $edition->questions[0]->template
                : 'cards';
            return view('booth', compact(
                'edition', 'inPerson', 'pastEditions', 'loadingTemplate'
            ));
        }

        // If in limbo (after end_date and before publish_results), show placeholder
        if ($edition->isAwaitingResults()) {
            return view('placeholder', compact('edition', 'pastEditions'));
        }

        // If after end_date AND publish_results, show results
        if ($edition->resultsPublished()) {
            $results = $edition->fullResults();
            $turnout = $edition->votes_cast(); // CHANG THIS
            $census = $edition->voters()->count();
            $page = $edition->buildResultsPage();

            return view('results', compact(
                'edition', 'results', 'turnout', 'census', 'pastEditions', 'page'
            ));
        }

        // If none of the previous conditions are met
        // display the About page as a placeholder before the vote.
        $page = $edition->buildAboutPage();

        return view('about', compact('edition', 'pastEditions', 'page'));

    }

    /**
     * Placeholder page with instructions.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        $edition = $this->edition;
        $pastEditions = Edition::pastEditions();
        $page = $edition->buildAboutPage();

        return view('about', compact('edition', 'pastEditions', 'page'));
    }

    /**
     * Placeholder page with instructions.
     *
     * @return \Illuminate\View\View
     */
    public function propose()
    {
        $edition = $this->edition;
        $pastEditions = Edition::pastEditions();

        return view('propose', compact('edition', 'pastEditions'));
    }

    /**
     * Projects
     */
    public function projects()
    {
        $editions = Edition::where('has_projects', 1)->orderBy('id', 'desc')->get();
        return view('projects', compact('editions'));
    }

    /**
     * Returns the stand-alone sidebar to inject via AJAX
     *
     * @return \Illuminate\View\View
     */
    public function sidebar()
    {
        $edition = $this->edition;
        $pastEditions = Edition::pastEditions();

        return view('components.sidebar', compact('edition', 'pastEditions'));
    }

    /**
     * Display option information
     *
     * @return \Illuminate\View\View
     */
    public function option(Option $option)
    {
        if ($option->attachments) $option->attachments = explode("\n", $option->attachments);
        if ($option->pictures) $option->pictures = explode("\n", $option->pictures);

        return view('components.option', compact('option'));
    }

    /**
     * Show a user's IP address to assist Support
     * in troubleshooting problems with IP limits.
     *
     * @return \Illuminate\View\View
     */
    public function myIpAddress(Request $request)
    {
        $ip = \App\Limit::ip();

        return view('ip_address')->withIp($ip);
    }

    private function checkEditionExists()
    {
        if (!$this->edition) {
            $message = 'Create your first edition by running
                <pre>php artisan edition:new</pre>
                or create a fake one to test: <pre>php artisan db:seed</pre>';

            return view('errors.503', compact('message'));
        }
    }
}
