<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image'];

    public static function get_menus($id){
      return Menu::where(['id'=>$id])->get();
    }

    public static function get_food($id){
      return Menu::find($id);
    }
}
