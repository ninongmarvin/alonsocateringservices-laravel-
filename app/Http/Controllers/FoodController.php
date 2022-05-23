<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Menu;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{
    //

    function foods(){
      $foods = Food::all();
      $selections = Session::get('food_selection');
      $food_selection = explode(",", $selections);

      return view('food', ['foods'=>$foods, 'food_selection'=>$food_selection]);
    }

    function add_food(Request $req){

      $req->validate([
        'type' => 'required|unique:food',
        'image' => 'required',
        'name' => 'required',
        'price' => 'required',
      ]);

      $name = $req->name;
      $image = $req->image;
      $price = $req->price;

      $names = array();
      $images = array();
      $prices = array();

      foreach($name as $n => $collection){
        array_push($names, $collection);
      }

      foreach($req->file('image') as $i){

        $filename = $i->getClientOriginalName();
        $i->move(public_path('images'), $filename);
        array_push($images, $filename);
      }

      foreach($price as $p => $collection){
        array_push($prices, $collection);
      }

      $count = count($names);
      $food = new Food;
      $food->type = $req->type;
      $food->save();

      $new_food = Food::where(['type'=>$req->type])->first();
      for($i=0;$i<=$count-1;$i++){
        $data = [
          'food_id'=>$new_food->id,
          'name'=>$names[$i],
          'price'=>$prices[$i],
          'image'=>$images[$i]
        ];

        Menu::insert($data);
      }

      return redirect()->back();

    }

    function add_selection(Request $req){
      $req->validate([
        'image' => 'required',
        'name' => 'required',
        'price' => 'required',
      ]);

      $name = $req->name;
      $image = $req->image;
      $price = $req->price;

      $names = array();
      $images = array();
      $prices = array();

      foreach($name as $n => $collection){
        array_push($names, $collection);
      }

      foreach($req->file('image') as $i){

        $filename = $i->getClientOriginalName();
        $i->move(public_path('images'), $filename);
        array_push($images, $filename);
      }

      foreach($price as $p => $collection){
        array_push($prices, $collection);
      }

      $count = count($names);

      for($i=0;$i<=$count-1;$i++){
        $data = [
          'food_id'=>$req->food_id,
          'name'=>$names[$i],
          'price'=>$prices[$i],
          'image'=>$images[$i]
        ];

        Menu::insert($data);
      }

      return redirect()->back();
    }

    function food_cart(Request $req){
      $food_id = $req->food_id;
      $selection = $req->session()->get('food_selection');
      $all_selections = $food_id. "," .$selection;

      $req->session()->put('food_selection', $all_selections);

      return redirect()->back();
    }
}
