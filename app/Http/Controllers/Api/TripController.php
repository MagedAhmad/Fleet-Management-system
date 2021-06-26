<?php

namespace App\Http\Controllers\Api;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TripResource;

class TripController extends Controller
{   
    /**
     * Get all trips
     *
     * @return void
     */
    public function index()
    {
        return TripResource::collection(Trip::all());
    }

    /**
     * Get trip
     *
     * @param Trip $trip
     * @return void
     */
    public function show(Trip $trip)
    {
        return new TripResource($trip);
    }
}
