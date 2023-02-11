<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Flight;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function page1()
    {
        $flights = Flight::where("flight_name", "RAC861")
            ->get();
        $reservations = Reservation::whereBelongsTo($flights)
            ->where("year", "2023")
            ->where("month", "3")
            ->where("day", "1")
            ->get();

        return view('reservation.page1')->with([
            'reservations' => $reservations,
        ]);
    }

    public function page2(Request $request)
    {
        $params = $request->query();

        if (isset($params["flight_name"])) {
            $flights = Flight::where("flight_name", $params["flight_name"])
                ->get();
        } else {
            $flights = Flight::get();
        }

        if ($flights->isNotEmpty()) {
            $reservations = Reservation::whereBelongsTo($flights);
            if (isset($params["year"])) {
                $reservations->where("year", $params["year"]);
            }

            if (isset($params["month"])) {
                $reservations->where("month", $params["month"]);
            }

            if (isset($params["day"])) {
                $reservations->where("day", $params["day"]);
            }
            $reservations = $reservations->get();
        } else {
            $reservations = [];
        }

        return view('reservation.page2')->with([
            'reservations' => $reservations,
            'params' => $params,
        ]);
    }
}
