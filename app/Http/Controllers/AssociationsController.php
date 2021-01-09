<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssociationsController extends Controller
{
    public function index()
    {
        return view('associations');
    }
}
