<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableService extends Model
{
    use HasFactory;

    protected $fillable = ['service_type', 'price', 'guests', 'set_up', 'venue', 'planner'];

    public static function get_service($id){
      return AvailableService::find($id);
    }
}
