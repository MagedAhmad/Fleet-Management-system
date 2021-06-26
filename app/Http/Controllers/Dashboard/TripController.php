<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Trip;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\TripRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TripController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * TripController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Trip::class, 'trip');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::latest()->paginate();

        return view('dashboard.trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();

        return view('dashboard.trips.create', compact('stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\TripRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TripRequest $request)
    {
        $trip = Trip::create($request->all());

        flash(trans('trips.messages.created'));

        return redirect()->route('dashboard.trips.show', $trip);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Trip $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        return view('dashboard.trips.show', compact('trip'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Trip $trip
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();

        flash(trans('trips.messages.deleted'));

        return redirect()->route('dashboard.trips.index');
    }
}
