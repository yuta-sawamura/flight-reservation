<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ["year", "month", "day", "seat_class"];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getSeatClass(): string
    {
        if ($this->seat_class === 0) return "ビジネス";
        return "エコノミー";
    }
}
