<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    /**
     * Static Controller responsible for the view('home').
     */
    public function home()
    {
        return view('landing');
    }

}
