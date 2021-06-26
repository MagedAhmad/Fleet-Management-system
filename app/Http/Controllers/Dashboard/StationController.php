<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\StationRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * StationController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Station::class, 'station');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::latest()->paginate();

        return view('dashboard.stations.index', compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.stations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StationRequest $request)
    {
        $station = Station::create($request->all());

        flash(trans('stations.messages.created'));

        return redirect()->route('dashboard.stations.show', $station);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Station $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return view('dashboard.stations.show', compact('station'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Station $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        return view('dashboard.stations.edit', compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\StationRequest $request
     * @param \App\Models\Station $station
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StationRequest $request, Station $station)
    {
        $station->update($request->all());

        flash(trans('stations.messages.updated'));

        return redirect()->route('dashboard.stations.show', $station);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Station $station
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Station $station)
    {
        $station->delete();

        flash(trans('stations.messages.deleted'));

        return redirect()->route('dashboard.stations.index');
    }
}
