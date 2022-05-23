<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueDescription extends Model
{
    use HasFactory;

    protected $fillable = ['location', 'image', 'capacity', 'description'];

    public static function get_ven_desc($id){
      return VenueDescription::where(['id'=>$id])->first();
    }

    public static function get_venue($id){
      return VenueDescription::find($id);
    }
}
