<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Hotel;
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
        $hotels = Hotel::all();
        $activities = Activity::all();

        return view('pages.home', compact('hotels', 'activities'));
    }
}
