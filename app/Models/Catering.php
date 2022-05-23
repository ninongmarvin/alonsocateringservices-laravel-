<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'image'];

    public function all_services(){
      return $this->hasMany(AvailableService::class);
    }

    public static function get_catering($id){
      return Catering::where(['id'=>$id])->first();
    }

    public static function get_type($id){
      return Catering::find($id);
    }

}
