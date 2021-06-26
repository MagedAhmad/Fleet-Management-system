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
}
