<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * load the main web page.
     *
     * @author karam mustafa
     */
    public function index()
    {
        return view('home');
    }
}
