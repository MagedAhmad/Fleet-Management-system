<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stoppage extends Model
{
    use HasFactory;

    /**
     * Protected fields for mass assignement
     *
     * @var array
     */
    protected $guarded = [];
    
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
     * Get station
     *
     * @return void
     */
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
