<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Edition;

class ArchiveController extends Controller
{
    /**
     * Show the results for an edition
     *
     * @return \Illuminate\View\View
     */
    public function results(Edition $edition)
    {
        $results = $edition->fullResults();
        $turnout = $edition->votes_cast();
        $census = $edition->voters()->count();
        $votes = $edition->results()->get()->sum('points');
        $pastEditions = Edition::pastEditions();
        $isArchive = true;

        return view('results', compact('edition', 'results', 'turnout', 'votes', 'census', 'pastEditions', 'isArchive'));
    }

    /**
     * Show the Edition about page.
     *
     * @return \Illuminate\View\View
     */
    public function about(Edition $edition)
    {
        $pastEditions = Edition::pastEditions();
        $page = $edition->buildAboutPage();
        $isArchive = true;

        return view('about', compact('edition', 'pastEditions', 'page', 'isArchive'));
    }

    /**
     * Display ported 2017 results
     *
     * @return \Illuminate\View\View
     */
    public function archive2017()
    {
        return view('editions.2017');
    }
}
