<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    // $bus->available_seats($from, $to);

    /**
     * Seat count
     */
    const SEATS_COUNT = 12;

    /**
     * Get reserved seats
     *
     * @param App\Models\Station $start
     * @param App\Models\Station $end
     * @return App\Models\Seat $seats
     */
    public function reserved_seats($start, $end) 
    {
        $reserved_seats = $this->seats()->whereHas('bookings',function($query) use ($start,$end) {
            $query->where('start_id', '<=', $end)->where('end_id', '>=', $start);
        });
    
        return $reserved_seats;
    }

    /**
     * Get available seats
     *
     * @param App\Models\Station $start
     * @param App\Models\Station $end
     * @return App\Models\Seat $seats
     */
    public function available_seats($start, $end) 
    {
        $reserved_seats = $this->reserved_seats()->pluck('id');

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
        return (count($this->reserved_seats) < Bus::SEATS_COUNT);
    }

    /**
     * Get seats
     *
     * @return void
     */
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
    
    /**
     * Get trip
     *
     * @return void
     */
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
