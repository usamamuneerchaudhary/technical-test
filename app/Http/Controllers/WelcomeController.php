<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Turbine;

class WelcomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $farm = Farm::first();
        $turbines = Turbine::latest()->get();
        return view('welcome', compact('farm', 'turbines'));
    }
}
