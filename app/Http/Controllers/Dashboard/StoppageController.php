<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Trip;
use App\Models\Station;
use App\Models\Stoppage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StoppageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Trip $trip)
    {
        return view('dashboard.trips.stoppages.index', compact('trip'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trip $trip)
    {
        $stations = Station::all();

        return view('dashboard.trips.stoppages.create', compact('trip', 'stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Trip $trip)
    {
        $trip->stoppages()->create([
            'station_id' => $request->station_id,
            'order' => $request->order
        ]);

        flash(trans('stoppages.messages.created'));

        return redirect()->route('dashboard.stoppages.index', $trip);
    }
}
