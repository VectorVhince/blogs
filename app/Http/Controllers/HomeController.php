<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opinion;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opinions = Opinion::orderBy('id', 'desc')->take(2)->get();
        return view('welcome')->with('opinions', $opinions);
    }
}
