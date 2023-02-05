<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ["password", "customer_name"];

    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'customer_id');
    }
}
