<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        //fetch from db
        //calculation

        return view('about');

    }

    public function welcome(){

        return view('welcome2');

    }
}
