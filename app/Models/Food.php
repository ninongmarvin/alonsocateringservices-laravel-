<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'menu_id'];

    public function selection(){
      return $this->hasMany(Menu::class);
    }
    
}
