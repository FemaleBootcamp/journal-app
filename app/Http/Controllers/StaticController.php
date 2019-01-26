<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StaticController extends Controller
{
    /**
     * Static Controller responsible for the view('home').
     */
    public function home()
    {
        $user = Auth::user();
        if ($user !== null) {
            return redirect(route('dashboard'));
        }
        return view('landing',compact('user'));
    }
    
    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard',compact('user'));
    }
    public function team()
    {
        return view('about-us',compact('user'));
    }

}