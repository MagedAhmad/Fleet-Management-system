<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use App\Models\Stoppage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SeatResource;
use App\Http\Requests\Api\BusRequest;

class BusController extends Controller
{
    /**
     * Get available seats on from one station to another
     *
     * @param BusRequest $request
     * @param Bus $bus
     * @return JsonResoponse
     */
    public function available_seats(BusRequest $request, Bus $bus)
    {
        $start_stoppage = Stoppage::where('station_id', $request->start_id)
            ->where('trip_id', $bus->trip->id)
            ->first();

        $end_stoppage = Stoppage::where('station_id', $request->end_id)
            ->where('trip_id', $bus->trip->id)
            ->first();

        $available_seats = $bus->available_seats($start_stoppage->order, $end_stoppage->order);

        return $available_seats;
    }
}
