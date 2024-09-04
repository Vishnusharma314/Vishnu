<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\User;

class FlightController extends Controller
{

    public function welcome()
    {
        return view('flight-search');
    }
    public function create()
    {
        return view('admin.create-flight');
    }

    public function store(Request $request)
    {
        $flight = new Flight();
        $flight->name = trim($request->flight_name);
        $flight->takeoff_location = trim($request->takeoff_location);
        $flight->landing_location = trim($request->landing_location);
        $flight->operating_days = json_encode($request->operating_days);
        $flight->save();

        return redirect()->back()->with('success', 'Flight added successfully');
    }

    public function search(Request $request)
    {
        $flights = Flight::where('takeoff_location', trim($request->boarding_location))
            ->where('landing_location', trim($request->destination_location))
            ->whereJsonContains('operating_days', trim($request->day_of_travel))
            ->get();

        return response()->json($flights);
    }
}
