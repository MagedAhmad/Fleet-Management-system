<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'depature_station_id',
        'arrival_station_id'
    ];

    /**
     * Boot methods for trip
     *
     * @return void
     */
    protected static function boot(){
        parent::boot();

        static::deleting(function($trip){
            Bus::where('trip_id', $trip->id)->delete();
        });

        static::created(function($trip) {
            Bus::create([
                'trip_id' => $trip->id
            ]);

            $trip->stoppages()->create([
                'station_id' => $trip->depature_station->id,
                'order' => 0
            ]);
            
            $trip->stoppages()->create([
                'station_id' => $trip->arrival_station->id,
                'order' => 100
            ]);
        });
    }

    /**
     * Get depature station
     *
     * @return void
     */
    public function depature_station()
    {
        return $this->belongsTo(Station::class, 'depature_station_id');
    }

    /**
     * Get arrival station
     *
     * @return void
     */
    public function arrival_station()
    {
        return $this->belongsTo(Station::class, 'arrival_station_id');
    }

    /**
     * Get trip stoppages
     *
     * @return void
     */
    public function stoppages()
    {
        return $this->hasMany(Stoppage::class);
    }
}
