<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['food_id', 'venue_id', 'catering_id', 'fullname', 'phone_number', 'email'];
}
