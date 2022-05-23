<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['city_name', 'venue_description_id'];

    public function get_description(){
      return $this->hasMany(VenueDescription::class);
    }

    public static function get_city($id){
      return City::find($id);
    }
}
