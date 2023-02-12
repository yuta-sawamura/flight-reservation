<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ["flight_name", "departure_place", "arrival_place", "time", "cap_business", "cap_economy"];

    public function convertIconByBusiness(): string
    {
        if ($this->business_seat_count >= 2) return "○";
        if ($this->business_seat_count === 1) return "△";
        return "×";
    }

    public function convertIconByEconomy(): string
    {
        if ($this->economy_seat_count >= 5) return "○";
        if ($this->economy_seat_count >= 1 && $this->economy_seat_count <= 4) {
            return "△";
        }
        return "×";
    }
}
