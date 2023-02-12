<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Flight;
use Illuminate\Support\Facades\DB;
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

    public function page3()
    {
        $flights = Flight::where("departure_place", "那覇")
            ->where("arrival_place", "南大東")
            ->get();

        $flight_ids = $this->getFlightIds($flights);
        $business = $this->getBusinessClass($flight_ids);
        $economy = $this->getEconomyClass($flight_ids);

        foreach ($flights as $flight) {
            foreach ($business as $v) {
                if ($flight->id === $v->flight_id) {
                    $flight["business_seat_count"] = $flight->cap_business - $v->count;
                }
            }
            foreach ($economy as $v) {
                if ($flight->id === $v->flight_id) {
                    $flight["economy_seat_count"] = $flight->cap_economy - $v->count;
                }
            }
        }

        return view('reservation.page3')->with([
            'flights' => $flights,
        ]);
    }

    private function getFlightIds(\Illuminate\Database\Eloquent\Collection $flights): array
    {
        $flight_ids = [];
        foreach ($flights as $flight) {
            array_push($flight_ids, $flight->id);
        }

        return $flight_ids;
    }

    private function getBusinessClass(array $flight_ids): \Illuminate\Support\Collection
    {
        return DB::table("reservations")
            ->select('flight_id')
            ->selectRaw('COUNT(flight_id) AS count')
            ->whereIn("flight_id", $flight_ids)
            ->where("year", "2023")
            ->where("month", "3")
            ->where("day", "2")
            ->where("seat_class", 0)
            ->groupBy("flight_id")
            ->get();
    }

    private function getEconomyClass(array $flight_ids): \Illuminate\Support\Collection
    {
        return DB::table("reservations")
            ->select('flight_id')
            ->selectRaw('COUNT(flight_id) AS count')
            ->whereIn("flight_id", $flight_ids)
            ->where("year", "2023")
            ->where("month", "3")
            ->where("day", "2")
            ->where("seat_class", 1)
            ->groupBy("flight_id")
            ->get();
    }

    public function page4(Request $request)
    {
        $params = $request->query();
        \DB::enableQueryLog();
        if (isset($params["departure_place"]) && isset($params["arrival_place"])) {
            $flights = Flight::where("departure_place", $params["departure_place"])
                ->where("arrival_place", $params["departure_place"])
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
            $reservations = $reservations->groupBy("flight_id")->get();
        } else {
            $reservations = [];
        }
        //dd(\DB::getQueryLog());

        return view('reservation.page4')->with([
            'reservations' => $reservations,
            'params' => $params,
        ]);
    }
}
