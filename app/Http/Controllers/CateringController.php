<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catering;
use App\Models\AvailableService;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CateringController extends Controller
{
    //

    function catering_services(){
      $caterings = Catering::all();

      return view('catering-services', ['caterings'=>$caterings]);
    }

    function add_services(Request $req){
      $req->validate([
        'event_name' => 'required',
        'image' => 'required',
        'type' => 'required',
        'price' => 'required',
        'capacity' => 'required',
        'venue1' => 'required',
      ]);

      $event_name = $req->event_name;
      $type = $req->type;
      $price = $req->price;
      $capacity = $req->capacity;
      $set_up = $req->set_up;
      $venue1 = $req->venue1;
      $planner = $req->planner;

      $types = array();
      $prices = array();
      $capacitys = array();
      $set_ups = array();
      $venue1s = array();
      $planners = array();
      $im = array();

      $imageName = $req->image->getClientOriginalName();

      $req->image->move(public_path('images'), $imageName);

      foreach($type as $t => $collection){
        array_push($types, $collection);
      }

      foreach($price as $p => $collection){
        array_push($prices, $collection);
      }

      foreach($capacity as $c => $collection){
        array_push($capacitys, $collection);
      }

      foreach($set_up as $s => $collection){
        array_push($set_ups, $collection);
      }

      foreach($venue1 as $v => $collection){
        array_push($venue1s, $collection);
      }

      foreach($planner as $p => $collection){
        array_push($planners, $collection);
      }


      $count = count($types);


      $catering = new Catering;
      $catering->type = $event_name;
      $catering->image = $imageName;
      $catering->save();

      $new_catering = Catering::where(['type'=>$event_name])->first();

      for($i=0;$i<=$count-1;$i++){
        $data = [
          'catering_id'=>$new_catering->id,
          'service_type'=>$types[$i],
          'price'=>$prices[$i],
          'guests'=>$capacitys[$i],
          'set_up'=>(int)$set_ups[$i],
          'venue'=>$venue1s[$i],
          'planner'=>(int)$planners[$i]
        ];

        AvailableService::insert($data);
      }

      return redirect()->back();
    }

    function add_types(Request $req){
      $req->validate([
        'type' => 'required',
        'price' => 'required',
        'capacity' => 'required',
        'venue1' => 'required',
      ]);

      $type = $req->type;
      $price = $req->price;
      $capacity = $req->capacity;
      $set_up = $req->set_up;
      $venue1 = $req->venue1;
      $planner = $req->planner;

      $types = array();
      $prices = array();
      $capacitys = array();
      $set_ups = array();
      $venue1s = array();
      $planners = array();

      foreach($type as $t => $collection){
        array_push($types, $collection);
      }

      foreach($price as $p => $collection){
        array_push($prices, $collection);
      }

      foreach($capacity as $c => $collection){
        array_push($capacitys, $collection);
      }

      foreach($set_up as $s => $collection){
        array_push($set_ups, $collection);
      }

      foreach($venue1 as $v => $collection){
        array_push($venue1s, $collection);
      }

      foreach($planner as $p => $collection){
        array_push($planners, $collection);
      }


      $count = count($types);

      for($i=0;$i<=$count-1;$i++){
        $data = [
          'catering_id'=>$req->cater_id,
          'service_type'=>$types[$i],
          'price'=>$prices[$i],
          'guests'=>$capacitys[$i],
          'set_up'=>(int)$set_ups[$i],
          'venue'=>$venue1s[$i],
          'planner'=>(int)$planners[$i]
        ];

        AvailableService::insert($data);
      }

      return redirect()->back();
    }

    function services_cart(Request $req){
      $event_type_id = $req->event_type_id;
      $service_type_id = $req->service_type_id;

      $full = $event_type_id. ",". $service_type_id;

      $req->session()->put('event_service', $full);

      return redirect()->back();
    }
}
