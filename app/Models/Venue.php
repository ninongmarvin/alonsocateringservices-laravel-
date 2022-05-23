<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = ['island', 'city_id'];

    public function all_venues(){
      return $this->hasMany(City::class);
    }

    public static function get_venue($id){
      return Venue::find($id);
    }
}
