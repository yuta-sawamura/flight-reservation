<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ["flight_name", "departure_place", "arrival_place", "time", "cap_business", "cap_economy"];
}
