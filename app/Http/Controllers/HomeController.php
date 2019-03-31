<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Places;
use App\Clean_Places;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function map()
    {
        return view('map');
    }
    public function add()
    {
        return view('add');
    }
    public function profile()
    {
        return view('profile', ['places' => $this->profile_places()]);
    }

    public function place_add(Request $request)
    {
        if(!$request->image->isValid())
            return;

        $image = $request->image->store('public/places');

        $data = [
            'name' => $request->name,
            'country' => $request->country,
            'geo' => $request->geo,
            'image' => $image,
            'state' => 1
        ];
        $result = Places::updateOrCreate($data);

        return redirect()->route('add')->with('status', 'New place created!');
    }

    private function last_added()
    {

    }
    private function last_cleaned()
    {

    }
    private function map_places()
    {

    }
    public function profile_places()
    {
        // Count places and show all profile cards.
        $data = Clean_Places::where('user_id', \Auth::id())->leftjoin('places as pl', 'pl.id', '=', 'cleaned_places.place_id')->get();
        $count = $data->count();

        return collect(['data' => $data, 'count' => $count]);
    }
}
