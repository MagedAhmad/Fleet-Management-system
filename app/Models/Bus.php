<?php

namespace App\Models;

use App\Models\Helpers\BookingHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory, BookingHelpers;

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
