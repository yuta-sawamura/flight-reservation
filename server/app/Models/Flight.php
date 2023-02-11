<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ["flight_name", "departure_place", "arrival_place", "time", "cap_business", "cap_economy"];

    public function getCapBusiness(): string
    {
        if ($this->cap_business >= 2) return "○";
        if ($this->cap_business === 1) return "△";
        return "×";
    }

    public function getCapEconomy(): string
    {
        if ($this->cap_economy >= 5) return "○";
        if ($this->cap_economy >= 1 && $this->cap_economy <= 4) {
            return "△";
        }
        return "×";
    }
}
