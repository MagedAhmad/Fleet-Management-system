<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    /**
     * Fillable fields for mass assignment
     *
     * @var array
     */
    protected $fillable = [
        'trip_id'
    ];

    /**
     * Seat count
     */
    const SEATS_COUNT = 12;

    /**
     * Boot methods for bus
     *
     * @return void
     */
    protected static function boot(){
        parent::boot();

        // Delete seats and records 
        static::deleting(function($bus){
            Seat::where('bus_id', $bus->id)->delete();
            Booking::where('bus_id', $bus->id)->delete();
        });

        // create seats
        static::created(function($bus) {
            Seat::factory()->count(Bus::SEATS_COUNT)->create(['bus_id' => $bus->id]);
        });
    }

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
     * @param App\Models\Station $start
     * @param App\Models\Station $end
     * @return App\Models\Seat $seats
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

    /**
     * Get bus bookings
     *
     * @return void
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
