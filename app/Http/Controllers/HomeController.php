<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
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

    /**
     * load the main web page.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @author karam mustafa
     */
    public function register(RegisterRequest $request)
    {
        dd($request->all());

        return view('pages.home', compact('hotels', 'activities'));
    }
}
