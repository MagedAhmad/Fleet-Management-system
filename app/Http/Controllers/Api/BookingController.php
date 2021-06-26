<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Requests\Api\BookingRequest;

class BookingController extends Controller
{
    /**
     * Book a seat in trip
     *
     * @param Request $request
     * @return void
     */
    public function book(BookingRequest $request)
    {
        $bus = Bus::findOrFail($request->bus_id);
        $first_station = Station::findOrFail($request->start_id);
        $end_station = Station::findOrFail($request->end_id);

        $seats = $bus->available_seats($first_station->order, $end_station->order);

        if(!count($seats)) {
            return response()->json([
                'message' => __('bookings.messages.not_available_seats'),
            ]);
        }

        $booking = $bus->bookings()->create([
            'seat_id' => $seats->first()->id,
            'start_id' => $request->start_id,
            'end_id' => $request->end_id,
            'customer_id' => auth()->id()
        ]);

        return new BookingResource($booking);
    }
}
