<?php

namespace App\Http\Controllers\Api;

use App\Models\Bus;
use App\Models\Station;
use App\Models\Stoppage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookingResource;
use App\Http\Requests\Api\BookingRequest;

class BookingController extends Controller
{
    /**
     * Book a seat in trip
     *
     * @param BookingRequest $request
     * @param Bus $bus
     * @return JsonResponse
     */
    public function book(BookingRequest $request, Bus $bus)
    {
        $start_stoppage = Stoppage::where([
            'station_id' => $request->start_id,
            'trip_id' => $bus->trip->id
            ])->first();

        $end_stoppage = Stoppage::where('station_id', $request->end_id)
            ->where('trip_id', $bus->trip->id)
            ->first();
        
        // Make sure stations order is correct in the trip
        if($start_stoppage->order >= $end_stoppage->order) {
            return response()->json([
                'message' => __('bookings.messages.check_route') 
            ]);
        }

        $available_seats = $bus->available_seats($start_stoppage->order, $end_stoppage->order);

        if(!count($available_seats)) {
            return response()->json([
                'message' => __('bookings.messages.not_available_seats'),
            ]);
        }

        $booking = $bus->bookings()->create([
            'seat_id' => $available_seats->first()->id,
            'start_id' => $request->start_id,
            'end_id' => $request->end_id,
            'customer_id' => auth()->id()
        ]);

        return new BookingResource($booking);
    }
}
