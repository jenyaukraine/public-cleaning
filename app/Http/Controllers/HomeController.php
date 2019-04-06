<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Places;
use App\Clean_Places;
use App\Review_Place;

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
        $added = $this->last_added();
        $cleaned = $this->last_cleaned();
        return view('home', ['added' => $added, 'cleaned' => $cleaned]);
    }
    public function map()
    {
        $response = $this->map_places();

        return view('map', ['map'=>$response]);
    }
    public function add()
    {
        return view('add');
    }
    public function profile()
    {
        return view('profile', ['places' => $this->profile_places()]);
    }

    public function single_place($id){
        $id = (int) $id;
        $data = Places::where('places.id', $id)->leftjoin('review_place as rp', 'rp.place_id', '=', 'places.id')->first();

        return view('place', ['place' => $data, 'id'=>$id]);
    }
    public function place_add(Request $request)
    {
        if(!$request->image->isValid())
            return;

        $image = $request->image->store('places', 'public');

        $data = [
            'name' => $request->name,
            'country' => $request->country,
            'geo' => $request->geo,
            'image' => $image,
            'state' => 2
        ];
        $result = Places::updateOrCreate($data);

        return redirect()->route('add')->with('status', 'New place created!');
    }

    private function last_added()
    {
        $data = Places::where('state', 2)->orderBy('created_at', 'desc')->get();
        return $data;
    }
    private function last_cleaned()
    {
        $data = Places::where('state', 1)->orderBy('updated_at', 'desc')->get();
        return $data;
    }
    private function map_places()
    {
        $data = Places::get();
        return $data;
    }
    public function profile_places()
    {
        // Count places and show all profile cards.
        $data = Clean_Places::where('user_id', \Auth::id())->leftjoin('places as pl', 'pl.id', '=', 'cleaned_places.place_id')->get();
        $count = $data->count();

        return collect(['data' => $data, 'count' => $count]);
    }

    public function place_review(Request $request){

        if(!$request->image->isValid())
            return;

        $image = $request->image->store('places', 'public');

        $data = [
            'user_id' => \Auth::id(),
            'place_id' => $request->place_id,
            'review_image' => $image,
            'approved' => 2
        ];
        $result = Review_Place::updateOrCreate($data);

        $this->setState($request->place_id, 3);

        return redirect()->route('place', $request->place_id)->with('status', 'Status changed!');
    }

    public function admin_review(){
        if(\Auth::id() != 1)
        return redirect()->route('home')->with('status', 'Access denied!');
        $data = Review_Place::select("*","review_place.id as review_id")->join('places as pl', 'pl.id', '=', 'review_place.place_id')->where('state', 3)->get();

        return view('admin_review', ['places' => $data]);
    }

    public function admin_delete($id){
        $data = Review_Place::find($id);
        $place_id = $data->place_id;

        if($data){
            $destroy = Review_Place::destroy($id);
        }

        $this->setState($place_id, 2);

        if($destroy){
            return [
                'status'=>'1',
                'msg'=>'success'
            ];
        } else {
            return [
                'status'=>'0',
                'msg'=>'fail'
            ];
        }
    }

    public function admin_approve($id, $userid){
        $data = Review_Place::find($id);
        $place_id = $data->place_id;

        if($data){
            $data->approved = 1;
            $data->save();
        }

        $clean = [
            'user_id' => $userid,
            'place_id' => $place_id,
        ];
        Clean_Places::updateOrCreate($clean);

        $this->setState($place_id, 1);

        return [
            'status'=>'1',
            'msg'=>'success'
        ];
    }

    private function setState($place_id, $state){
        $places = Places::find($place_id);
        $places->state = $state;
        $places->save();
    }


}
