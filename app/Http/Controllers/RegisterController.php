<?php

namespace App\Http\Controllers;

use App\Events\SendEmail;
use App\Http\Requests\RegisterRequest;
use App\Models\Activity;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * load the main web page.
     *
     * @author karam mustafa
     */
    public function index()
    {
        $hotels = Hotel::withCount('users')->get();
        $hotels  = collect($hotels)->filter(function ($item){
            return $item->capacity > $item->users_count;
        });
        $activities = Activity::all();

        return view('pages.register', compact('hotels', 'activities'));
    }

    /**
     * load the main web page.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @author karam mustafa
     */
    public function store(RegisterRequest $request)
    {

        DB::transaction(function () use ($request) {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);

            $data = $this->calculateTotalCost($request, $data);

            $user = User::create($data);
            if ($request->activities) {
                $user->activities()->attach($request->activities);
            }

            event(new SendEmail($user));
        });

        session()->flash('success' , trans('global.register_success_with_desc'));
        return redirect()->route('home.index');
    }

    /**
     * description
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @param  array  $data
     *
     * @return array
     * @author karam mustafa
     */
    private function calculateTotalCost(RegisterRequest $request, array $data)
    {
        $data['total_cost'] = 0;

        if ($request->activities) {
            $data['total_cost'] += Activity::whereIn('id', $request->activities)->sum('price');
        }

        if ($request->hotel_id) {
            $data['total_cost'] += Hotel::where('id', $request->hotel_id)->first()->price;
        }
        return $data;
    }
}
