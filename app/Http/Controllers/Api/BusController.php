<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
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
        $available_seats = $bus->available_seats($request->start_id, $request->end_id);

        return SeatResource::collection($available_seats);
    }
}
