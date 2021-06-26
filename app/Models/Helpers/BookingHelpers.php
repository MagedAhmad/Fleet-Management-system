<?php 

namespace App\Models\Helpers;

use App\Models\Bus;
use Illuminate\Support\Facades\Gate;

trait BookingHelpers 
{
    /**
     * Get reserved seats
     *
     * @param integer $start order of start station
     * @param integer $end order of end station
     * @return Illuminate\Support\Collection $reserved_seats
     */
    public function reserved_seats($start, $end) 
    {
        $reserved_seats = [];

        foreach($this->bookings as $booking)
        {
            $booking_start_order = $booking->start->order;
            $booking_end_order = $booking->end->order;

            // for each bus booking  
            // if seat is reserved push to array
            if($end >= $booking_start_order && $start <= $booking_end_order) {
                array_push($reserved_seats, $booking->seat);
            }
        }
    
        return collect($reserved_seats);
    }

    /**
     * Get available seats
     *
     * @param integer $start order of start station
     * @param integer $end order of end station
     * @return Illuminate\Support\Collection $seats
     */
    public function available_seats($start, $end) 
    {
        $reserved_seats = $this->reserved_seats($start, $end)->pluck('id');

        $seats = $this->seats()->whereNotIn('id', $reserved_seats)->get();
    
        return $seats;
    }

    /**
     * Check if bus is available
     *
     * @param App\Models\Station $start
     * @param App\Models\Station $end
     * @return boolean
     */
    public function isAvailable($start, $end)
    {
        return (count($this->reserved_seats($start, $end)) < Bus::SEATS_COUNT);
    }
}