<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Catering;


class UserController extends Controller
{
    function admin(){
      $orders = Order::where(['accepted'=>0])->get();

      // Top 5 Foods
      $menu = array();
      foreach($orders as $order){
        $foods = explode(',', $order->foods);
        foreach($foods as $food => $collection){
          if($collection == ""){
            unset($collection);
          }else{
            array_push($menu, $collection);
          }
        }
      }

      $vals = array_count_values($menu);
      arsort($vals);
      $top_foods = array_slice($vals, 0, 5, true);
      $top = array_keys($top_foods);
      // Top 5 Foods

      // Top 5 Venues
      $venues = array();
      foreach($orders as $order){
        $ven = explode(',', $order->venue);
        array_push($venues, $ven[2]);
      }

      $vals = array_count_values($venues);
      arsort($vals);
      $top_venue = array_slice($vals, 0, 5, true);
      $top_venues = array_keys($top_venue);
      // Top 5 Venues

      // Top 5 Services
      $services = array();
      foreach($orders as $order){
        $serve = explode(',', $order->event_service);
        array_push($services, $serve[0]);
      }

      $vals = array_count_values($services);
      arsort($vals);
      $top_service = array_slice($vals, 0, 5, true);
      $top_services = array_keys($top_service);
      // Top 5 Services

      return view('admin', ['orders'=>$orders, 'foods'=>$top, 'venues'=>$top_venues, 'services'=>$top_services]);
    }
}
