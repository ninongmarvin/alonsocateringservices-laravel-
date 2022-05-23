<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    function turn_order(Request $req){
      $order = new Order;
      $order->foods = $req->foods;
      $order->venue = $req->venue;
      $order->event_service = $req->event_service;
      $order->fullname = $req->fullname;
      $order->phone_number = $req->number;
      $order->email = $req->email;
      $order->date = $req->date;

      $order->save();

      $req->session()->flush();

      return redirect()->back();
    }

    function approve(Request $req){
      $id = $req->order_id;
      $order = Order::findOrFail($id);
      $order->accepted = 1;
      $order->save();

      return redirect()->back()->with('status', 'Successfully approved an order!');
    }
}
