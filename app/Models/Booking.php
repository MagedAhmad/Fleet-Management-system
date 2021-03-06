<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * Protected from mass assignment
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get bus
     *
     * @return void
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    /**
     * Get seat
     *
     * @return void
     */
    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }

    /**
     * Get start station
     *
     * @return void
     */
    public function start()
    {
        return $this->belongsTo(Stoppage::class, 'start_id');
    }

    /**
     * Get end station
     *
     * @return void
     */
    public function end()
    {
        return $this->belongsTo(Stoppage::class, 'end_id');
    }

    /**
     * Get customer
     *
     * @return void
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
