<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{

    /**
     * load the main web page.
     *
     * @author karam mustafa
     */
    public function index()
    {
        return view('pages.home');
    }
}
