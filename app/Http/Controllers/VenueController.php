<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venue;
use App\Models\City;
use App\Models\VenueDescription;
use File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class VenueController extends Controller
{
    //

    function venues(){
      $venues = Venue::all();

      return view('venue', ['venues'=>$venues]);
    }

    function add_cities(Request $req){
      $req->validate([
        'cities' => 'required',
        'location' => 'required',
        'capacity' => 'required',
        'description' => 'required',
      ]);

      $existing = City::where(['city_name'=>$req->cities])->get();
      $test = count($existing);

      if($test == 0){
        $location = $req->location;
        $image = $req->image;
        $capacity = $req->capacity;
        $description = $req->description;

        $locations = array();
        $images = array();
        $capacitys = array();
        $descriptions = array();

        foreach($location as $l => $collection){
          array_push($locations, $collection);
        }

        foreach($req->file('image') as $i){

          $filename = $i->getClientOriginalName();
          $i->move(public_path('images'), $filename);
          array_push($images, $filename);
        }

        foreach($capacity as $c => $collection){
          array_push($capacitys, $collection);
        }

        foreach($description as $d => $collection){
          array_push($descriptions, $collection);
        }

        $count = count($location);
        $city = new City;
        $city->city_name = $req->cities;
        $city->venue_id = $req->island_id;
        $city->save();

        $new_city = City::where(['city_name'=>$req->cities])->first();
        for($i=0;$i<=$count-1;$i++){
          $data = [
            'city_id'=>$new_city->id,
            'location'=>$locations[$i],
            'capacity'=>$capacitys[$i],
            'image'=>$images[$i],
            'description'=>$descriptions[$i]
          ];

          VenueDescription::insert($data);
        }
      }else{
        $location = $req->location;
        $image = $req->image;
        $capacity = $req->capacity;
        $description = $req->description;

        $locations = array();
        $images = array();
        $capacitys = array();
        $descriptions = array();

        foreach($location as $l => $collection){
          array_push($locations, $collection);
        }

        foreach($req->file('image') as $i){

          $filename = $i->getClientOriginalName();
          $i->move(public_path('images'), $filename);
          array_push($images, $filename);
        }

        foreach($capacity as $c => $collection){
          array_push($capacitys, $collection);
        }

        foreach($description as $d => $collection){
          array_push($descriptions, $collection);
        }

        $count = count($location);

        $city = City::where(['city_name'=>$req->cities])->first();
        for($i=0;$i<=$count-1;$i++){
          $data = [
            'city_id'=>$city->id,
            'location'=>$locations[$i],
            'capacity'=>$capacitys[$i],
            'image'=>$images[$i],
            'description'=>$descriptions[$i]
          ];

          VenueDescription::insert($data);
        }
      }

      return redirect()->back();
    }

    function venue_cart(Request $req){
      $island_id = $req->island_id;
      $city_id = $req->city_id;
      $description_id = $req->description_id;

      $full = $island_id. "," .$city_id. "," .$description_id;

      $req->session()->put('venue', $full);

      return redirect()->back();
    }
}
